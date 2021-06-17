#include <EEPROM.h>
#include "WiFi.h"
#include <HTTPClient.h>

//Declare WiFi variables
const char *ssid = "AndroidAP";
const char *password = "12345678";

//Declare EEPROM variables
/*EEPROM Memory
0 : Id of device
1 : Id of connected account
*/
#define deviceId 0
#define userId 1

//Declare internal variables
const int ir = GPIO_NUM_35;
//When to go back to sleep
int Sleep_timer = -1;
int Sleep_last;
int Sleep_current;
int stop = 0;
void sleep()
{
    //Sleep
    Serial.print("sleep");
    esp_deep_sleep_start();
}


void setup()
{
    Serial.begin(9600);

    esp_sleep_enable_ext0_wakeup(GPIO_NUM_35, 1);
    esp_sleep_enable_timer_wakeup(3600000000);

    //Setup EEPROM variables
    EEPROM.begin(512);
    //Setup internal variables
    pinMode(ir, INPUT);
    //Povezovanje na wifi
    if (ssid != NULL && password != NULL)
    {
        WiFi.begin(ssid, password);
        while (WiFi.status() != WL_CONNECTED)
        {
            delay(500);
            Serial.println("Connecting to WiFi..");
        }
        Serial.println("Connected to the WiFi network");

        //Preverjanje inicializacije naprave
        if (EEPROM.read(deviceId) == 255)
        {
            HTTPClient http;
            http.begin("https://www.e-mis.si/first_boot.php");
            http.addHeader("Content-Type", "application/x-www-form-urlencoded");
            int httpResponseCode = http.POST("api_key=zDK3yYY839");

            if (httpResponseCode > 0)
            {
                String id = http.getString();
                int id1 = id.toInt();
                EEPROM.write(deviceId, id1); //Spravi Narejen ID v EEPROM
                EEPROM.commit();
                Serial.print("HTTP Response code: ");
                Serial.println(httpResponseCode);
            }
            else
            {
                Serial.print("Error code: ");
                Serial.println(httpResponseCode);
            }
            http.end();
        }
        Serial.print(EEPROM.read(deviceId));
    }
}

void loop()
{
   if(!stop){
    //Wake up because of trap activation
    if (digitalRead(ir) == 0)
    {   // Vratca so bila odprta v zadnjih 5s in IR sensor je zaznal premik
        // Pošiljanje podatkov
        HTTPClient http;
        http.begin("https://www.e-mis.si/testing/backend/sql_pushData.php");
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        char _post[100];
        String _2post = "api_key=zDK3yYY839&deviceId="+String(EEPROM.read(deviceId));
        Serial.print(_2post.c_str());
        //sprintf(_post, "api_key=zDK3yYY839&deviceId=%s", EEPROM.read(deviceId));
        int httpResponseCode = http.POST(_2post.c_str());

        if (httpResponseCode > 0)
        {
            Serial.print("HTTP Response code: ");
            Serial.println(httpResponseCode);
        }
        else
        {
            Serial.print("Error code: ");
            Serial.println(httpResponseCode);
        }
        // Free resources
        http.end();

        //Go to sleep
        //sleep();
        stop=1;
        
    }

    if (Sleep_timer > -1)
    { // Sleep timer
        Sleep_current = millis();
        Sleep_timer += Sleep_current - Sleep_last;
        Sleep_last = Sleep_current;
    }
    if (Sleep_timer > 60000)
    { //Po 60ih sekundah naj gre nazaj v spanje
        sleep();
    }
   }
}
