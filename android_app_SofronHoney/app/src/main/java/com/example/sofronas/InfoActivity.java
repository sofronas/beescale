package com.example.sofronas;

import android.os.Bundle;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

public class InfoActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.info);

        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null) {
            actionBar.setDisplayHomeAsUpEnabled(true);
        }
        //Set Logo at the top of bar
        ActionBar actionBar2 = getSupportActionBar();
        //set up title from a string
        actionBar2.setTitle(getString(R.string.info_app));
        actionBar2.setDisplayShowHomeEnabled(true);
    }

    //Back Button
    @Override
    public boolean onSupportNavigateUp() {
        finish();
        return true;
    }
}