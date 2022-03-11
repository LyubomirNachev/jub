#include <dht11.h>
#define DHT11PIN 4

dht11 DHT11;

void setup()
{
  Serial.begin(9600);
  Serial.print("Starting calibration");
  delay(100000);
  Serial.println("End!");
 
}

void loop()
{
  Serial.println();

  int chk = DHT11.read(DHT11PIN);
  int gasPin = A0;
  int sensor_MQ7 = A1;
  int sensor_MQ3 = A2;
  int sensor_MQ8 = A3;
  Serial.print("Humidity (%): ");
  Serial.println((float)DHT11.humidity, 4);
  
  Serial.print("Temperature (C): ");
  Serial.println((float)DHT11.temperature, 4);

  Serial.print("Gas: ");
  Serial.println(analogRead(gasPin));

  Serial.print("Carbon Monoxide: ");
  Serial.println(analogRead(sensor_MQ7));

  Serial.print("Alchohol value: ");
  Serial.println(analogRead(sensor_MQ3));

  Serial.print("Hydrogen value: ");
  Serial.println(analogRead(sensor_MQ8));
  

  delay(2000);

}
