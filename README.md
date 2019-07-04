# Ζυγαριά μελισσιού - Beescale
[![N|Solid](https://sofronas.github.io/img/bee_logo_powered.png)](https://sofronas.github.io/)
### Περιγραφή:
Ένα ηλεκτρονικό σύστημα παρακολούθησης μιας μελισσοκομικής κυψέλης από απόσταση. Όποιος μελισσοκόμο θέλει να ενημερωθεί για τις συνθήκες που επικρατούν στην κυψέλη του την δεδομένη στιγμή, λαμβάνει ένα μήνυμα στο κινητό του τηλέφωνο (SMS) με τις τρέχουσες μετρήσεις της ζυγαριάς, την θερμοκρασία της κυψέλης ή του περιβάλλοντος ή και τα δύο, την υγρασία που υπάρχει και τέλος το βάρος της κυψέλης.

Για την ζυγαριά (beescale) χρησιμοποιήσουμε την πλακέτα Arduino Uno R3, έναν αισθητήρα θερμοκρασίας (DS18B20), έναν αισθητήρα υγρασίας (DHT11 ή DHT22), έναν αισθητήρα μέτρησης βάρους (Load Cell 150kg + HX711) και μία πρόσθετη πλακέτα gsm shield ώστε να λαμβάνουμε τις μετρήσεις μέσω δικτύου κινητής τηλεφωνίας.

Τα στοιχεία που μας παρέχονται για τη μεταβολή του βάρους μπορούμε να τα χρησιμοποιήσουμε για να μεγιστοποιήσουμε την απόδοση μας, με τη εξαγωγή του μέλιού μας την κατάλληλη στιγμή. Αν κάτι πάει στραβά τότε κρίνουμε εάν απαιτείται επέμβαση του μελισσοκόμου για τη φροντίδα της κυψέλης, ώστε να διασφαλιστεί η υγεία του μελισσιού και όχι μόνο.

### Κόστος
| Ν/Ν  | Προιόν  | Τιμή  | Ποσότητα  | Αιτία  |
|---|---|---|---|---|
| 1  | [Arduino Uno R3](https://grobotronics.com/arduino-uno-rev3.html)  | 22.90  | 1 | Βασική πλακέτα διαχείρισης  |
| 2 | [Καλώδιο Usb A to B](https://www.firesale.gr/index.php?_route_=powertech-kalothio-usb-2-0-se-usb-type-b-1m-chalkino-mauro.html&skr_prm=WyJhZDYzYWE2MC1hN2RhLTRhZDAtODg2NC03YmU3NDY3MTFjNWQiLDE1NjIyMjc1MTc3NDMseyJhcHBfdHlwZSI6IndlYiIsInRhZ3MiOiIifV0)  | 0.40  | 1  |  Καλώδιο σύνδεσης Arduino με τον Η/Υ |
| 3  |  [BreadBoard](https://www.devobox.com/el/breadboardsen/52-breadboard-half-size-400-tie-point-white.html?skr_prm=WyJhZDYzYWE2MC1hN2RhLTRhZDAtODg2NC03YmU3NDY3MTFjNWQiLDE1NjIyMjc5MzQ3NDMseyJhcHBfdHlwZSI6IndlYiIsInRhZ3MiOiIifV0) | 2.50  | 1  | Δοκιμαστική Πλακέτα  |
| 4 |[Καλώδια](https://www.cableworks.gr/ilektronika/arduino-and-microcontrollers/prototyping/dupont-jumper-wires/40pcs-small-male-to-male-dupont-wires-cables-for-arduino-10cm-m-m/?skr_prm=WyJhZDYzYWE2MC1hN2RhLTRhZDAtODg2NC03YmU3NDY3MTFjNWQiLDE1NjIyMjgwNzA3NDIseyJhcHBfdHlwZSI6IndlYiIsInRhZ3MiOiIifV0) | 3.00 | 40 | Καλώδια σύνδεσης Arduino - Πλακέτας - Αισθητήρων|
| 5 | [DS18B20](https://www.cableworks.gr/ilektronika/arduino-and-microcontrollers/sensors/temperature/ds18b20-18b20-to-92-thermometer-temperature-sensor-for-arduino-dallas/?skr_prm=WyJhZDYzYWE2MC1hN2RhLTRhZDAtODg2NC03YmU3NDY3MTFjNWQiLDE1NjIyMjgxNzg3NjIseyJhcHBfdHlwZSI6IndlYiIsInRhZ3MiOiIifV0)| 1.80 | 1 | Αισθητήρας Θερμοκρασίας|
| 6 | [DHT11](https://grobotronics.com/dht11.html) | 1.90 | 1 | Αισθητήρας Υγρασίας|
| 7 | [HX711](https://www.hellasdigital.gr/electronics/sensors/weight-sensors/weighing-sensor-module-24-bit-a-d-conversion-hx711-for-arduino/)| 2.50 | 1 | Μέρος για τον αισθητήρα βάρους|
| 8 | [Load Cell](https://www.hellasdigital.gr/electronics/sensors/weight-sensors/150kg-weighing-scale-load-cell-sensor/)| 31.00 | 1 | Αισθητήρας βάρους 150 kg| 
| 9 | [Καλώδια](https://grobotronics.com/jumper-wires-15cm-female-to-male-pack-of-10.html) | 1.80 | 10 | Καλώδια σύνδεσης HX711 - Αισθητήρας βάρους - Arduino|
| 10 | [GSM Shield](https://www.hellasdigital.gr/go-create/arduino-shields-and-accessories/arduino-gsm-shield-2-antenna-connector/) | 119.04 | 1 | Πλακέτα κινητής τηλεφωνίας|
| 11 | [Μπαταρία](https://www.thebatteryshop.gr/index.php?route=product/product&product_id=267) | 15.00 | 1 | Μπαταρία 12V 7.2 Ah Επαναφορτιζόμενη|
| 12 | [Διακόπτης](https://www.easytechnology.gr/index.php?main_page=product_info&products_id=29576&ref=bestprice.gr) | 4.00 | 1 | Διακόπτης On/Off Κυκλώματος|

Συνολικό Κόστος : 205.84 €

### Extra Υλικά (Προαιρετικά)
| Ν/Ν  | Προιόν  | Τιμή  | Ποσότητα  | Αιτία  |
|---|---|---|---|---|
| 1 | [Ηλιακό Πάνελ](https://energypower.gr/proionta/fotovoltaiko-panel-monokristalliko-luxor-solo-line-10w/?skr_prm=WyJhZDYzYWE2MC1hN2RhLTRhZDAtODg2NC03YmU3NDY3MTFjNWQiLDE1NjIyMjkzMTc3NjEseyJhcHBfdHlwZSI6IndlYiIsInRhZ3MiOiIifV0)  | 12.35  | 1  | Για φόρτιση μπαταρίας από τον ήλιο  |
| 2 | [Ρυθμιστής](https://www.babaloo.gr/product/rythmistis-fortisis-mpatarias-fotovoltaikon-20a-12v-cmtp20-oem/?skr_prm=WyJhZDYzYWE2MC1hN2RhLTRhZDAtODg2NC03YmU3NDY3MTFjNWQiLDE1NjIyMjkzNzA3NDkseyJhcHBfdHlwZSI6IndlYiIsInRhZ3MiOiIifV0)  | 12.30  | 1  |  Ρυθμιστής Φόρτισης Μπαταρίας Φωτοβολταϊκών – 20A 12V   |
| 3 | [Καλώδιο](https://www.smart-cover.gr/product/%CE%BA%CE%B1%CE%BB%CF%89%CE%B4%CE%B9%CE%BF-%CF%83%CF%85%CE%BD%CE%B4%CE%B5%CF%83%CE%B7%CF%83-%CE%B1%CF%80%CE%BF-%CF%81%CF%85%CE%B8%CE%BC%CE%B9%CF%83%CF%84%CE%B7-%CF%86%CE%BF%CF%81%CF%84%CE%B9%CF%83/)  | 8.56  | 3 | Σύνδεση Πάνελ - Ρυθμιστή - Μπαταρία  |

Έξτρα Κόστος: 50.33 €
Συνολικό Κόστος : 256.17 €

### Πρόγραμμα - Software
Τι χρησιμοποιήσαμε:

* [Arduino](https://www.arduino.cc/en/Guide/Windows) - Arduino Ide For Windows
ή
* [Arduino](https://www.arduino.cc/en/Guide/Linux) - Arduino Ide For Linux

### Βιβλιοθήκες
Χρησιμοποιήσαμε:
* [Dht 11](https://github.com/adidax/dht11) - Βιβλιοθήκη για τον αισθητήρα υγρασίας
* [DS18b20](https://github.com/milesburton/Arduino-Temperature-Control-Library) - Βιβλιοθήκη για τον αισθητήρα θερμοκρασίας
* [HX711](https://www.arduinolibraries.info/libraries/hx711-arduino-library) - Βιβλιοθήκη για τον μικροεπεξεργαστή του αισθητήρα βάρους
* [GSM](https://www.arduino.cc/en/Reference/GSM) - Βιβλιοθήκη για τον μικροεπεξεργαστή της πλακέτας της κινητής τηλεφωνίας

### Εγκατάσταση Βιβλιοθηκών

Για να γίνει η εγκατάσταση των βιβλιοθηκών στο σύστημα μας αρκεί να εκτελέσουμε τα εξής βήματα αφότου έχει προηγηθεί η αποσυμπίεση των αρχείων:

Σε Windows:
```
C:\Βιβλιοθήκες\Έγγραφα\Arduino\Libraries
```
Σε Linux:
```
/home/username/Documents/Arduino/Libraries
```

### Άδεια - License
---
....
