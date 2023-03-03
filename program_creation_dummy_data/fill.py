#=========================================#
# Fill up demo data - Program             #
# Author: Sofronas Konstantinos Sotirios  #
#=========================================#

import random
import datetime
import csv

def exportCSV(row):
    with open('data.csv', 'w', newline='') as file:
        writer = csv.writer(file)
        writer.writerows(row)

# Create random date
def getMonth(month,final_days):
    values = list()
    for i in range(1,final_days):
        #print("{:02}-{:02}-{}:  {}\t{}\t{}".format(i,month,"2022",getTemp(),getHum(),getWei()))
        values.append([0,"sof","2022" + "/" + str(month) + "/" + str(i),getTemp(),getHum(),getWei()])
    return values

# Get random number representing temperature
def getTemp():
    return round(random.uniform(1,48),2)

# Get random number representing humidity
def getHum():
    return round(random.uniform(1,100),2)

# Get random number representing weight
def getWei():
    return round(random.uniform(1,170),2)

def start():
    #print('#:\t\tTemp:\tHum:\tWeig:\t')
    data = list()
    for i in range(1,13):
        #Month 31
        if i == 1 or i == 3 or i == 5 or i == 7 or i == 8 or i == 10 or i == 12:
            data = data + getMonth(i,32)
        #Month 30
        elif i == 4 or i == 6 or i == 9 or i == 11:
            data = data + getMonth(i,31)
        # February 28 days
        elif i == 2:
            data = data + getMonth(i,29)
    exportCSV(data)

if __name__ == "__main__":
    start()