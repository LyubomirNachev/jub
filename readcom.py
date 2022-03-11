import os
import serial
#Serial takes two parameters: serial device and baudrate
ser = serial.Serial('/dev/ttyUSB0', 9600);

while(1):
    data = ser.readline();
    os.system("php datawrite.php "+data.decode('utf-8'));
    #print(data.decode('utf-8'), end='');

