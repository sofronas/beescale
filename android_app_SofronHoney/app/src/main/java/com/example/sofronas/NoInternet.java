package com.example.sofronas;

import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

public class NoInternet extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_no_internet);

        //Set Logo at the top of bar
        ActionBar actionBar = getSupportActionBar();
        //set up title from a string
        actionBar.setTitle(getString(R.string.noInternet));
        actionBar.setDisplayShowHomeEnabled(true);
        actionBar.setIcon(R.mipmap.no_wifi_round);

        ImageView closebtn = (ImageView) this.findViewById(R.id.imageButton);

        closebtn.setOnClickListener(new View.OnClickListener() {
            @Override
            //close the application
            //it cannot work without internet
            //no data to display
            public void onClick(View v) {
                finish();
            }
        });
    }
}