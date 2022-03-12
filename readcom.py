import os
import serial
#Serial takes two parameters: serial device and baudrate
ser = serial.Serial('COM6', 9600);

while(1):
    data = ser.readline();
    os.system("D:\\xampp2\\php\\php.exe datawrite.php "+data.decode('utf-8'));
    #print(data.decode('utf-8'), end='');