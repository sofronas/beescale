//==========================================================
//=                         SETUP                          =
//==========================================================
/*Include Libraries*/
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <GSM.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <dht.h>
#include "HX711.h"

/*Define pins*/
//Καλώδιο εξόδου θερμοκρασία DS1820B
#define ONE_WIRE_BUS 4
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);

#define PINNUMBER ""

//Varos
#define DOUT  5 //mple
#define CLK  6 //kitrino

//Καλώδιο εξόδου υγρασίας DTH11
dht DHT;
#define DHT11_PIN 10 //mple
 
HX711 scale;

float calibration_factor = 1234;


/*Globals*/
GSM gsm;
GSM_SMS sms;

//==========================================================
//=                      GLOBALS                           =
//==========================================================
float temperature1;  /*DS1820B*/
float temperature2; /*DTH11*/
float temperature;
float weight;
float metrisi;
int humidity;
int readData; /*Humidity check data*/
int flag_for_v = 0; /*flag for metrisi varous*/
char phone[20] = "+30696969696969";
char msg[160]; /*Message*/
char str[30]; /*helpful array for SMS*/
int i=0; /*counter*/
int j=0; /*counter for sms*/
//==========================================================
//=                         PROGRAM                        =
//==========================================================
void setup()
{
    arxi();
    delay(10000);
    
    /*Power up sensors*/
    scale.begin(DOUT, CLK);
    long zero_factor = scale.read_average(); //Get a baseline reading
    scale.set_scale(calibration_factor);
    readData = DHT.read11(DHT11_PIN);
    
    sensors.begin();
    metrao_ugrasia();
    metrao_ther();
    metrao_varos();
    stelno_sms();
}

void loop()
{
    
}

void arxi()
{
    boolean notConnected = true;
    
    Serial.begin(9600);
    while(!Serial)
    {
      ; /*waiting serial to connect*/
    }
    Serial.println("Bee Hive System");
    /*Start GSM*/
  
    while(notConnected)
    {
      if(gsm.begin(PINNUMBER) == GSM_READY)
      {
        notConnected = false;
      }
      else
      {
        Serial.println("GSM Not Connected");
        delay(1000);
      }
    }
    
    /*GSM Shied is connected*/
    Serial.println("GSM initialized");
}

void metrao_varos()
{
    int i = 0;
    for(i=0;i<200;i++)
    {
      weight = scale.get_units()/2.2046;
    }
    weight = scale.get_units()/2.2046;
    weight = scale.get_units()/2.2046;
    Serial.print("Metrao Varos ");
    Serial.print(weight, 3); Serial.println(" kgs");
}


void metrao_ther()
{
    sensors.requestTemperatures();
    temperature1 = sensors.getTempCByIndex(0);
    Serial.print("Temperature 1 :"); Serial.println(temperature1);
    temperature2 = DHT.temperature;
    Serial.print("Temperature 2 :");  Serial.println(temperature2);

    /*Finalize Temperature*/
    if(temperature2 > temperature1)
    {
      temperature = temperature1;
    }
    else
    {
      if(temperature1 < 0){
        temperature = temperature2;
      }
      else{
        temperature = temperature1;  
      }
    }
}


void metrao_ugrasia()
{
    humidity = DHT.humidity;
    Serial.print("Humidity :");  Serial.println(humidity);
}

void stelno_sms()
{
    strcpy(str,"Thermokrasia: ");
    j=0;
    for(;j<strlen(str);i++)
    {
        msg[i] = str[j];
        j++;
    }
  
    dtostrf(temperature, 4, 2, str);
    j=0;
    for(;j<strlen(str);i++)
    {
        msg[i] = str[j];
        j++;
    }
  
    strcpy(str," C\nYgrasia: ");
    j=0;
    for(;j<strlen(str);i++)
    {
        msg[i] = str[j];
        j++;
    }
  
    sprintf(str,"%d %%",humidity);
    j=0;
    for(;j<strlen(str);i++)
    {
        msg[i] = str[j];
        j++;
    }
  
    strcpy(str,"\nWeight: ");
    j=0;
    for(;j<strlen(str);i++)
    {
        msg[i] = str[j];
        j++;
    }
  
    dtostrf(weight, 4, 2, str);
    j=0;
    for(;j<strlen(str);i++)
    {
        msg[i] = str[j];
        j++;
    }
  
    strcpy(str," kg");
    j=0;
    for(;j<strlen(str);i++)
    {
        msg[i] = str[j];
        j++;
    }
    
    for(j=i;j<strlen(msg);j++)
    {
        msg[i] = '\0';
    }
    delay(2000);
  //  Serial.println(msg);
    
    int sms_flag = 1;
    /*Send Message*/
    sms.beginSMS(phone);
    sms.print(msg);
    while(true){
      sms_flag = sms.endSMS();
      Serial.print("Sms Flag is:");
      Serial.println(sms_flag);
      if(sms_flag == 1){
        break;
      }
    }
    Serial.println("SMS --------------");
    Serial.println(msg);
    Serial.println("End --------------");
}
