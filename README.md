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
| 3  |   |   |   |   |

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
