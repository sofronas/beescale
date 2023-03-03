package com.example.sofronas.ui.month;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.preference.PreferenceManager;

import android.app.Activity;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.Gravity;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sofronas.R;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class ShowDataMonth extends AppCompatActivity {
    private ArrayList<Model> dataList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_show_data_month);
        String user_month_choice = getIntent().getStringExtra("USER_MONTH_CHOICE");
        int user_month_int = getIntent().getIntExtra("USER_MONTH_INT",0);
        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null) {
            actionBar.setDisplayHomeAsUpEnabled(true);
        }
        //Set Logo at the top of bar
        ActionBar actionBar2 = getSupportActionBar();
        //set up title from a string
        actionBar2.setTitle(user_month_choice);
        actionBar2.setDisplayShowHomeEnabled(true);
        actionBar2.setIcon(R.drawable.ic_month_activity);

        System.out.println("From showdatamonth: " + user_month_choice);
        System.out.println("USER_MONTH_INT:" + user_month_int);


        // Instantiate the RequestQueue.
        RequestQueue queue = Volley.newRequestQueue(this);
        SharedPreferences settings = PreferenceManager.getDefaultSharedPreferences(this);
        String ur = settings.getString("url", "127.0.0.1");
        String us = settings.getString("username_id", "sof");
        String url = "http://" + ur + "/thesis/android/getMonth.php?m=" + user_month_int + "&us=" + us;
        System.out.println(url);
        // Request a string response from the provided URL.
        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        System.out.println("Response is: "+ response);
                        Boolean check = false;
                        if(response.equals("")) {
                            check = true;
                        }
                        if(check == false) {
                            String[] data = response.toString().split("<tr>");
                            System.out.println(data);
                            int start, end;
                            List<String> daysOfMonth = new ArrayList<>();
                            List<String> tempOfMonth = new ArrayList<>();
                            List<String> humOfMonth = new ArrayList<>();
                            List<String> weiOfMonth = new ArrayList<>();
                            for (int i =1; i < data.length; i++){
                                start = data[i].indexOf("<td>") + 4;
                                end = data[i].indexOf("</td>");
                                String day = data[i].substring(start,end);
                                daysOfMonth.add(day);
                                String[] rest = data[i].split("<td>"+day+"</td>");
                                String[] res = rest[1].split("</tr>");
                                String[] re = res[0].split("</td>");
                                String[] temp = re[0].split("<td>");
                                tempOfMonth.add(temp[1]);
                                String[] hum = re[1].split("<td>");
                                humOfMonth.add(hum[1]);
                                String[] wei = re[2].split("<td>");
                                weiOfMonth.add(wei[1]);
                            }


                            dataList = new ArrayList<Model>();
                            Model header = new Model("N/N","Ημερομηνία","Θερ/σία ", "Υγρασία", "Βάρος");
                            dataList.add(header);

                            char c = 0x00B0; //symbol of Celsius
                            //make final data to import to list
                            int x = daysOfMonth.size();
                            for (int i=0; i<x; i++){
                                Model temp = new Model(Integer.toString(x-i), daysOfMonth.get(i), tempOfMonth.get(i) + " " + c + "C", humOfMonth.get(i) + " %", weiOfMonth.get(i) + " kg");
                                dataList.add(temp);
                            }

                            ListView lview = (ListView) findViewById(R.id.list_month);
                            ListViewAdapter adapter = new ListViewAdapter(ShowDataMonth.this, dataList);
                            lview.setAdapter(adapter);

                        } else if(check == true){
                            Toast t = Toast.makeText(getApplicationContext(), R.string.no_data_yet_month, Toast.LENGTH_SHORT);
                            t.show();
                        }
                        System.out.println("check was:" + check);
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast t = Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_SHORT);
                t.show();
            }
        });

        // Add the request to the RequestQueue.
        queue.add(stringRequest);
    }

    //Back Button
    @Override
    public boolean onSupportNavigateUp() {
        finish();
        return true;
    }
}