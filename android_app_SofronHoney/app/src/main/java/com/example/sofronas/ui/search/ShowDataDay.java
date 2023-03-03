package com.example.sofronas.ui.search;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.preference.PreferenceManager;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.ProgressBar;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sofronas.R;

public class ShowDataDay extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_show_data_day);

        String calendar_day_user = getIntent().getStringExtra("calendar_day_user");
//        System.out.println(calendar_day_user);

        String calendar_month_user = getIntent().getStringExtra("calendar_month_user");
//        System.out.println(calendar_month_user);

        String calendar_year_user = getIntent().getStringExtra("calendar_year_user");
//        System.out.println(calendar_year_user);

        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null) {
            actionBar.setDisplayHomeAsUpEnabled(true);
        }
        //Set Logo at the top of bar
        ActionBar actionBar2 = getSupportActionBar();
        //set up title from a string
        actionBar2.setTitle(R.string.searched_day_results);
        actionBar2.setDisplayShowHomeEnabled(true);
        actionBar2.setIcon(R.drawable.ic_month_activity);

        String final_day = calendar_day_user + "/" + (Integer.parseInt(calendar_month_user) + 1) + "/" + calendar_year_user;
        TextView date_top = findViewById(R.id.set_day_from_user_id);
        date_top.setText(final_day);


        // Instantiate the RequestQueue.
        RequestQueue queue = Volley.newRequestQueue(this);
        SharedPreferences settings = PreferenceManager.getDefaultSharedPreferences(this);
        String ur = settings.getString("url", "127.0.0.1");
        String us = settings.getString("username_id", "sof");
        String url = "http://" + ur + "/thesis/android/getSelectedDay.php";
        //creating url specific for sql query
        url = url + "?day=" + calendar_year_user + "/" + (Integer.parseInt(calendar_month_user) + 1)+ "/" + calendar_day_user;
        url = url + "&us=" + us;

        System.out.println("final url: " + url);
        // Request a string response from the provided URL.
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        // Display the first 500 characters of the response string.
                        //System.out.println("Response is: "+ response);

                        /*  Scenario
                            empty string = no data today
                            data:
                                first = temp
                                second = hum
                                third = weight
                            Analysis:
                                check if data are float
                                to fill bar with its int value
                         */
                        Boolean check = false;
                        if(response.equals("")) {
                            check = true;
                        }
                        if(check == false){
                            String[] data = response.toString().split("<br>");
                            TextView temp = (TextView)findViewById(R.id.texttemp);
                            ProgressBar tempBar = (ProgressBar)findViewById(R.id.progressBart);
                            try {
                                Float te = Float.parseFloat(data[0]);
                                Integer k = te.intValue();
                                tempBar.setProgress(k);
                            } catch (NumberFormatException e) {
                                tempBar.setProgress(Integer.parseInt(data[0]));
                            }
                            temp.setText(data[0] + " " + (char) 0x00B0+"C");

                            TextView hum = (TextView)findViewById(R.id.text_hum);
                            ProgressBar humBar = (ProgressBar)findViewById(R.id.progressBarh);
                            try {
                                Float hu = Float.parseFloat(data[1]);
                                Integer h = hu.intValue();
                                humBar.setProgress(h);
                            } catch (NumberFormatException e){
                                humBar.setProgress(Integer.parseInt(data[1]));
                            }
                            hum.setText(data[1] + " %");

                            TextView wei = (TextView)findViewById(R.id.text_wei);
                            ProgressBar weiBar = (ProgressBar)findViewById(R.id.progressBarw);
                            try{
                                Float tem = Float.parseFloat(data[2]);
                                Integer i = tem.intValue();
                                weiBar.setProgress(i);
                            } catch (NumberFormatException e) {
                                weiBar.setProgress(Integer.parseInt(data[2]));
                            }
                            wei.setText(data[2] + " kg");
                        } else {
                            TextView temp = (TextView)findViewById(R.id.texttemp);
                            ProgressBar tempBar = (ProgressBar)findViewById(R.id.progressBart);
                            tempBar.setProgress(0);
                            temp.setText("-");

                            TextView hum = (TextView)findViewById(R.id.text_hum);
                            ProgressBar humBar = (ProgressBar)findViewById(R.id.progressBarh);
                            humBar.setProgress(0);
                            hum.setText("-");

                            TextView wei = (TextView)findViewById(R.id.text_wei);
                            ProgressBar weiBar = (ProgressBar)findViewById(R.id.progressBarw);
                            weiBar.setProgress(0);
                            wei.setText("-");
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                System.out.println("Error: "+ error);
                System.out.println("That didn't work!");
            }
        });

        // Add the request to the RequestQueue.
        queue.add(stringRequest);
    }

    @Override
    public boolean onSupportNavigateUp() {
        finish();
        return true;
    }
}