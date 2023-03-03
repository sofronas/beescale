package com.example.sofronas;

import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.os.Handler;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.app.AppCompatDelegate;

import static com.example.sofronas.SettingsActivity.*;
import static com.example.sofronas.SettingsActivity.getDefaultDark;
import static com.example.sofronas.SettingsActivity.getHost;
import static com.example.sofronas.SettingsActivity.getPassword;
import static com.example.sofronas.SettingsActivity.getPhoneNumber;
import static com.example.sofronas.SettingsActivity.getUsername;

import com.example.sofronas.login.LoginActivity;

public class SplashActivity extends AppCompatActivity {
    private final int SPLASH_DELAY = 2000;
    private ImageView imageView;
    private GlobalClass globalVariable;
//    globalVariable = new GlobalClass();
//    globalVariable = (GlobalClass) void getApplicationContext();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        // Hide title bar for splash screen
        try
        {
            this.getSupportActionBar().hide();
        }
        catch (NullPointerException e){

        }
        setContentView(R.layout.activity_splash);

        getWindow().setBackgroundDrawable(null);

        // Find image and text to get the animation to work
        initializeView();
        // Animate logo
        animateLogo();

        //check if user is connected to the Internet
        if(!checkInternet()){
            //No internet connection show No internet activity
            show404();
        } else {
            globalVariable = new GlobalClass();
            loadSettings();
            // Show main activity (Main menu)
            openLogin();
        }
    }

    private void initializeView() {
        imageView = findViewById(R.id.imageView);
    }

    private void animateLogo() {
        Animation fadingInAnimation = AnimationUtils.loadAnimation(this,R.anim.fade_in);
        fadingInAnimation.setDuration(SPLASH_DELAY);
        imageView.startAnimation(fadingInAnimation);
    }

    private void loadSettings(){
        this.SetupTheme();
        this.SetupPhone();
        this.SetupUser();
        this.SetupPassword();
        this.SetupHost();
    }

    // Setup Theme to startup depends on user choice
    private void SetupTheme(){
        Boolean dark_theme = getDefaultDark(this);
        if (dark_theme == Boolean.TRUE) {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_YES);
            globalVariable.setDark_theme(Boolean.TRUE);
        } else {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO);
            globalVariable.setDark_theme(Boolean.FALSE);
        }
    }

    // Setup Phone to read SMS depends on user
    private void SetupPhone(){
        String phone = getPhoneNumber("phone_number_key", this);
        globalVariable.setPhoneNumber(phone);
    }

    // Setup User to connect Database to read/write data
    private void SetupUser(){
        String username = getUsername("username",this);
        globalVariable.setUsername(username);
    }

    // Setup Password for user
    private void SetupPassword(){
        String password = getPassword("password",this);
        globalVariable.setPassword(password);
    }

    // Setup Host URL for connection
    private void SetupHost(){
        String host = getHost("url",this);
        globalVariable.setHost(host);
    }

    private void show404(){
        new Handler().postDelayed(()->{
            startActivity(new Intent(com.example.sofronas.SplashActivity.this, NoInternet.class));
            finish();
        }, SPLASH_DELAY);
    }

    private void openLogin() {
        new Handler().postDelayed(()->{
            startActivity(new Intent(com.example.sofronas.SplashActivity.this, com.example.sofronas.login.LoginActivity.class));
            finish();
        }, SPLASH_DELAY);
    }

    private boolean checkInternet(){
        boolean connected = false;
        try {
            ConnectivityManager cm = (ConnectivityManager)getApplicationContext().getSystemService(Context.CONNECTIVITY_SERVICE);
            NetworkInfo nInfo = cm.getActiveNetworkInfo();
            connected = nInfo != null && nInfo.isAvailable() && nInfo.isConnected();
            return connected;
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        return connected;
    }
}