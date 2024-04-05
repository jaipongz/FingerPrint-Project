#include <Wire.h>
#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>
#include <LiquidCrystal_I2C.h>
int getFingerprintIDez();

// pin #2 is IN from sensor (GREEN wire)
// pin #3 is OUT from arduino  (WHITE wire)
SoftwareSerial mySerial(2, 3);
SoftwareSerial esp(10, 11);
LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE);


Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

void setup()
{
  Serial.begin(115200);
  lcd.begin(16,2); 
  lcd.setCursor(0,0);
  Serial.println("fingertest");
  lcd.setCursor(0,1);
  lcd.print("Scan your finger");
  delay(8000);
  lcd.clear();
  lcd.setCursor(0,0); //Start at character 0 on line 0
  
  esp.begin(115200);
  // set the data rate for the sensor serial port
  finger.begin(57600);

  if (finger.verifyPassword()) {
    Serial.println("Found fingerprint sensor!");
  } else {
    Serial.println("Did not find fingerprint sensor :(");
    while (1);
  }
  Serial.println("Waiting for valid finger...");
}

void loop()                     // run over and over again
{


  if(esp.available() > 0){
     Serial.write(esp.read());
         
    }
  

  
  int id = getFingerprintIDez();
  if (id != -1)
     delay(10);

  if (id == 1) {
    esp.print("553120410102#");
  }
   
  if (id == 2) {
   
    esp.print("553120410103#");
  }
  else if (id == 3) {
    
    esp.print("553120410104#");
  }
  else if (id == 4) {
    
    esp.print("553120410105#");
  }
  else if (id == 5) {
    
    esp.print("553120410107#");
  }
  else if (id == 6) {
    
    esp.print("553120410109#");
  }
  else if (id == 7) {
    
    esp.print("553120410110#");
  }
  else if (id == 8 ) {
    
    esp.print("553120410111#");
  }
  else if (id == 9) {
    
    esp.print("553120410112#");
  }
  else if (id == 10) {
    
    esp.print("553120410113#");
  }
  else if (id == 11) {
    
    esp.print("553120410117#");
  }
  else if (id == 12) {
    
    esp.print("553120410118#");
  }
  else if (id == 13) {
    
    esp.print("553120410122#");
  }
  else if (id == 14) {
    
    esp.print("553120410125#");
  }
  else if (id == 15) {
    
    esp.print("553120410131#");
  }
  else if (id == 16) {
    
    esp.print("553120410135#");
  }
  else if (id == 17) {
    
    esp.print("553120410138#");
  }
  else if (id == 18 ) {
    
    esp.print("553120410140#");
  }
  else if (id == 19) {
    
    esp.print("553120410144#");
  }
  else if (id == 20) {
    
    esp.print("553120410147#");
  }
  else if (id == 21) {
    
    esp.print("553120410149#");
  }
  else if (id == 22) {
    
    esp.print("553120410150#");
  }
  else if (id == 23) {
    
    esp.print("553120410151#");
  }
  else if (id == 24) {
    
    esp.print("553120410152#");
  } 
  else if (id == 25) {
    
    esp.print("5531204101525#");
  }   
    
  delay(30);            //don't ned to run this at full speed.
}

int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK) {
    lcd.setCursor(0, 0); lcd.print("Scan your finger");
    return -1;
  }

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK) {
    lcd.setCursor(0, 0); 
    return -1;
  }
//Scan your fingergain Scan
  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK) {
    lcd.clear();
    lcd.setCursor(0, 0); 
    lcd.print("Did not match!");
    lcd.setCursor(0, 1);
    lcd.print("Again Scan");
    delay(2000);
    lcd.clear();
    return -1;
  }
  else if(p == FINGERPRINT_NOTFOUND){
    lcd.clear();

    lcd.setCursor(0,0);

    lcd.print("Again scan");
    return -1;
  }

  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID);
  Serial.print(" with confidence of "); Serial.println(finger.confidence);
  lcd.setCursor(0, 0);
  lcd.clear();
  lcd.print("Found ID #"); lcd.print(finger.fingerID);
  delay(700);
  lcd.clear();
  if (finger.fingerID == 1) {
    lcd.print("Darawan");
    lcd.setCursor(0, 1);
    lcd.print("553120410102");
    delay(2000);
    lcd.clear();
  }
  
  else if (finger.fingerID == 2) {
    lcd.print("Narumon");
    lcd.setCursor(0, 1);
    lcd.print("553120410103");
    delay(2000);    
    lcd.clear();
  }
  else if (finger.fingerID == 3) {
    lcd.print("Benjamas");
    lcd.setCursor(0, 1);
    lcd.print("553120410104");
    delay(2000);    
    lcd.clear();
  }
 
  else if (finger.fingerID == 4) {
    lcd.print("Patcharee");
    lcd.setCursor(0, 1);
    lcd.print("553120410105");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 5) {
    lcd.print("Ratri");
    lcd.setCursor(0, 1);
    lcd.print("553120410107");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 6) {
    lcd.print("Lalita ");
    lcd.setCursor(0, 1);
    lcd.print("553120410109");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 7 ) {
    lcd.print("Waranya");
    lcd.setCursor(0, 1);
    lcd.print("553120410110");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 8) {
    lcd.print("Wilaiporn");
    lcd.setCursor(0, 1);
    lcd.print("553120410111");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 9) {
    lcd.print("Sureera ");
    lcd.setCursor(0, 1);
    lcd.print("553120410112");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 10) {
    lcd.print("Aphinun");
    lcd.setCursor(0, 1);
    lcd.print("553120410113");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 11) {
    lcd.print("Potekarapon");
    lcd.setCursor(0, 1);
    lcd.print("553120410117");
    delay(2000);    
    lcd.clear();
  }
  
  else if (finger.fingerID == 12) {
    lcd.print("Jakkapong");
    lcd.setCursor(0, 1);
    lcd.print("553120410118");
    delay(2000);    
    lcd.clear();
  }
  else if (finger.fingerID == 13) {
    lcd.print("Chitsanupong ");
    lcd.setCursor(0, 1);
    lcd.print("553120410122");
    delay(2000);    
    lcd.clear();
  }
 
  else if (finger.fingerID == 14) {
    lcd.print("Datchat");
    lcd.setCursor(0, 1);
    lcd.print("553120410125");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 15) {
    lcd.print("Thiraphat");
    lcd.setCursor(0, 1);
    lcd.print("553120410131");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 16) {
    lcd.print("Nantawat ");
    lcd.setCursor(0, 1);
    lcd.print("553120410135");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 17 ) {
    lcd.print("Pongthorn");
    lcd.setCursor(0, 1);
    lcd.print("553120410138");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 18) {
    lcd.print("Permpong");
    lcd.setCursor(0, 1);
    lcd.print("553120410140");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 19) {
    lcd.print("Wittawat  ");
    lcd.setCursor(0, 1);
    lcd.print("553120410144");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 20) {
    lcd.print("samorn ");
    lcd.setCursor(0, 1);
    lcd.print("553120410147");
    delay(2000);
    lcd.clear();
  }
 else if (finger.fingerID == 21) {
    lcd.print("Sittisuk  ");
    lcd.setCursor(0, 1);
    lcd.print("553120410149");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 22 ) {
    lcd.print("Atiwat");
    lcd.setCursor(0, 1);
    lcd.print("553120410150");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 23) {
    lcd.print("Aphichai");
    lcd.setCursor(0, 1);
    lcd.print("553120410151");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 24) {
    lcd.print("Narabodee");
    lcd.setCursor(0, 1);
    lcd.print("553120410152");
    delay(2000);
    lcd.clear();
  }
  else if (finger.fingerID == 25) {
    lcd.print("Wuttipong");
    lcd.setCursor(0, 1);
    lcd.print("553120410155");
    delay(2000);
    lcd.clear();
  }
 
  return finger.fingerID;
 
}
