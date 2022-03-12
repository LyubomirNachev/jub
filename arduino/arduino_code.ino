#include <dht11.h>
#include <MQ135.h>
#define DHT11PIN 4

dht11 DHT11;

const int sensor_MQ135 = A5;
MQ135 gasSensor = MQ135(sensor_MQ135);

#define         MQ8_PIN                      (3)    
#define         RL_VALUE                     (10)    
#define         RO_CLEAN_AIR_FACTOR          (9.21)  
#define         Ro2_CLEAN_AIR_FACTOR2          (9.83) 
#define         MQ2_PIN                       (0)     
#define         RL_VALUE2                     (5)     
#define         RO_CLEAN_AIR_FACTOR2          (9.83) 
#define         CALIBARAION_SAMPLE_TIMES     (50)    
#define         CALIBRATION_SAMPLE_INTERVAL  (500)   
#define         READ_SAMPLE_INTERVAL         (50)    
#define         READ_SAMPLE_TIMES            (5)     
#define         GAS_H2                       (1)
#define         GAS_LPG                      (2)
#define         GAS_Methan                   (3)
#define         GAS_SMOKE                    (4)
float           H2Curve[3]  =  {2.3, 0.93,-1.44};  
float           LPGCurve[3]  =  {2.3,0.21,-0.47};                                               
float           COCurve[3]  =  {2.3,0.72,-0.34};
float           SmokeCurve[3] ={2.3,0.53,-0.44};   
float           Ro           =  10;
float           Ro2          =  10;
float           sensor_volt;
float           RS_gas; 
float           R0 =84;
float           ratio;
float           BAC;
int             R2 = 2000;
              
void setup()
{
  Serial.begin(9600);
  Serial.print("Starting calibration... ");
  Ro = MQCalibration(MQ8_PIN); 
  Ro2 = MQCalibration(MQ2_PIN);
  Serial.print("Calibration is done...\n"); 
}

void loop()
{
  int chk = DHT11.read(DHT11PIN);
  int sensor_MQ7 = A4;
  int sensor_MQ3 = A2;
  int sensor_MQ9 = A1;
  float ppm = gasSensor.getPPM();
  int sensorValue = analogRead(sensor_MQ3);
  sensor_volt=(float)sensorValue/1024*5.0;
  RS_gas = ((5.0 * R2)/sensor_volt) - R2; 
  R0 = 16000;
  ratio = RS_gas/R0;
  double x = 0.4*ratio;   
  BAC = pow(x,-1.431);
  
  Serial.print((float)DHT11.humidity, 4 );
  Serial.print(" ");
  Serial.print((float)DHT11.temperature, 4 );
  Serial.print(" ");
  Serial.print(MQGetGasPercentage(MQRead(MQ8_PIN)/Ro,GAS_H2 ) );
  Serial.print(" ");
  Serial.print(MQGetGasPercentage2(MQRead(MQ2_PIN)/Ro2,GAS_LPG ) );
  Serial.print(" ");
  Serial.print(MQGetGasPercentage2(MQRead(MQ2_PIN)/Ro2,GAS_Methan ) );
  Serial.print(" ");
  Serial.print(MQGetGasPercentage2(MQRead(MQ2_PIN)/Ro2,GAS_SMOKE ) );
  Serial.print(" ");
  Serial.print(BAC*0.0001 );
  Serial.print(" ");
  Serial.print(ppm );
  Serial.print(" ");
  Serial.print(analogRead(sensor_MQ7));
  Serial.print(" ");
  Serial.print(analogRead(sensor_MQ9));
  Serial.print("\n");

  delay(5000);

}
//MQ8
float MQResistanceCalculation(int raw_adc)
{
  return ( ((float)RL_VALUE*(1023-raw_adc)/raw_adc));
}

float MQCalibration(int mq_pin)
{
  int i;
  float val=0;

  for (i=0;i<CALIBARAION_SAMPLE_TIMES;i++) {            
    val += MQResistanceCalculation(analogRead(mq_pin));
    delay(CALIBRATION_SAMPLE_INTERVAL);
  }
  val = val/CALIBARAION_SAMPLE_TIMES;                  
  val = val/RO_CLEAN_AIR_FACTOR;                       
  return val; 
}

float MQRead(int mq_pin)
{
  int i;
  float rs=0;
  for (i=0;i<READ_SAMPLE_TIMES;i++) {
    rs += MQResistanceCalculation(analogRead(mq_pin));
    delay(READ_SAMPLE_INTERVAL);
  }
  rs = rs/READ_SAMPLE_TIMES;
  return rs;  
}
int MQGetGasPercentage(float rs_ro_ratio, int gas_id)
{
  if ( gas_id == GAS_H2) {
     return MQGetPercentage(rs_ro_ratio,H2Curve);
  }  
  return 0;
}
int  MQGetPercentage(float rs_ro_ratio, float *pcurve)
{
  return (pow(10,( ((log(rs_ro_ratio)-pcurve[1])/pcurve[2]) + pcurve[0])));
}


//MQ2
float MQResistanceCalculation2(int raw_adc2)
{
  return ( ((float)RL_VALUE2*(1023-raw_adc2)/raw_adc2));
}
float MQCalibration2(int mq_pin2)
{
  int i;
  float val=0;

  for (i=0;i<CALIBARAION_SAMPLE_TIMES;i++) {            //take multiple samples
    val += MQResistanceCalculation2(analogRead(mq_pin2));
    delay(CALIBRATION_SAMPLE_INTERVAL);
  }
  val = val/CALIBARAION_SAMPLE_TIMES;                   //calculate the average value

  val = val/Ro2_CLEAN_AIR_FACTOR2;                        //divided by Ro2_CLEAN_AIR_FACTOR2 yields the Ro2 
                                                        //according to the chart in the datasheet 

  return val; 
}
float MQRead2(int mq_pin2)
{
  int i;
  float rs2=0;
  for (i=0;i<READ_SAMPLE_TIMES;i++) {
    rs2 += MQResistanceCalculation2(analogRead(mq_pin2));
    delay(READ_SAMPLE_INTERVAL);
  }
  rs2 = rs2/READ_SAMPLE_TIMES;
  return rs2;  
}
int MQGetGasPercentage2(float rs2_Ro2_ratio, int gas_id2)
{
  if ( gas_id2 == GAS_LPG ) {
     return MQGetPercentage2(rs2_Ro2_ratio,LPGCurve);
  } else if ( gas_id2 == GAS_Methan ) {
     return MQGetPercentage2(rs2_Ro2_ratio,COCurve);
  } else if ( gas_id2 == GAS_SMOKE ) {
     return MQGetPercentage2(rs2_Ro2_ratio,SmokeCurve);
  }    

  return 0;
}
int  MQGetPercentage2(float rs2_Ro2_ratio, float *pcurve2)
{
  return (pow(10,( ((log(rs2_Ro2_ratio)-pcurve2[1])/pcurve2[2]) + pcurve2[0])));
}
