#include <ESP8266WiFi.h>  //คำสั่ง ขอเรียกคำสั่งพื้นฐาน

int errorcount = 0;    // Variable for triggering error message.
// Variable to decide which error message to display.
// 0: DHT22 error
// 1: ESP8266 error
int errortype = 0;
const char* ssid     = "Free_Wi-Fi";//ชื่อ wifi
const char* password = "043721781";

const char* host = "192.168.1.244";// ip  ของ wifi  ที่เชื่อมต่อ
const char* PASSCODE = "123456789";

char dataid[12];
int count = 0;

void setup() {    //ค่าเริ่มต้น
  Serial.begin(115200);
  delay(10);

  // We start by connecting to a WiFi network

  Serial.println();
  Serial.println();
  Serial.print("Connecting to");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password); 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("connecting to ");
  Serial.println(host);
}

void loop() {  //คำสั่งต่างๆในการทำงาน เป็นการเขียนเเบบวนซ้ำ
  //dataid[0] = 1;
  //sendData(dataid);
  
  // Use WiFiClient class to create TCP connections
  if(Serial.available() > 0){ 
    char data = Serial.read();  
    if(data == '#')
    {
      sendData(dataid);
      count=0;
    }else  
      dataid[count++] = data;
  }
}

void sendData(String data){
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  
  // We now create a URL for the request
  String url = "http://localhost/final_project/data.php?code=";
  url += PASSCODE;
  url += "&id=";
  url += data;
  
  Serial.print("Requesting URL:");
  Serial.println(url);
  
  // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
  delay(10);
  
  // Read all the lines of the reply from server and print them to Serial
  while(client.available()){ 
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
  
  Serial.println();
  Serial.println("disconnection");


  }
  
