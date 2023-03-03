package com.example.sofronas.ui.month;

public class Model {

    private String sNo;
    private String date;
    private String temp;
    private String humd;
    private String weight;

    public Model(String sNo, String date, String temp, String humd, String weight) {
        this.sNo = sNo;
        this.date = date;
        this.temp = temp;
        this.humd = humd;
        this.weight = weight;
    }

    public String getsNo() {
        return sNo;
    }

    public String getDate() {
        return date;
    }

    public String getTemp() {
        return temp;
    }

    public String getHumd() {
        return humd;
    }

    public String getWeight(){
        return weight;
    }
}