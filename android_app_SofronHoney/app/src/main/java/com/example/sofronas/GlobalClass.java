package com.example.sofronas;

public class GlobalClass {
    private static String phoneNumber;
    private static String host;
    private static String username;
    private static String password;
    private Boolean dark_theme;

    public GlobalClass(){
        this.phoneNumber = null;
        this.host = null;
        this.username = null;
        this.password = null;
        this.dark_theme = false;
    }

    public void setPhoneNumber(String phone){
        this.phoneNumber = phone;
    }

    public void setHost(String url){
        this.host = url;
    }

    public void setUsername(String username){
        this.username = username;
    }

    public void setPassword(String password){
        this.password = password;
    }

    public void setDark_theme(Boolean dark_theme){
        this.dark_theme = dark_theme;
    }

    public String getPhone(){
        return this.phoneNumber;
    }

    public String getHost(){
        return this.host;
    }

    public String getUsername(){
        return this.username;
    }

    public String getPassword(){
        return this.password;
    }

    public Boolean getDark_Theme(){
        return this.dark_theme;
    }
}
