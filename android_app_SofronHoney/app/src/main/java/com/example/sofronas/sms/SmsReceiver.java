package com.example.sofronas.sms;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.telephony.SmsMessage;
import android.widget.ListView;
import android.widget.Toast;

import androidx.preference.PreferenceManager;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sofronas.R;
import com.example.sofronas.SettingsActivity;
import com.example.sofronas.ui.month.ListViewAdapter;
import com.example.sofronas.ui.month.Model;
import com.example.sofronas.ui.month.ShowDataMonth;

import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class SmsReceiver extends BroadcastReceiver {

    public void onReceive(Context context, Intent intent) {

        if(intent.getAction().equals("android.provider.Telephony.SMS_RECEIVED")){
            Bundle bundle = intent.getExtras();           //---get the SMS message passed in---
            SmsMessage[] msgs = null;
            String msg_from;
            String phoneNumber = SettingsActivity.getPhone(context);
            String username = SettingsActivity.getUsername(context);
            String password = SettingsActivity.getPassword(context);
            String host = SettingsActivity.getHost(context);
            if (bundle != null){
                //---retrieve the SMS message received---
                try{
                    Object[] pdus = (Object[]) bundle.get("pdus");
                    msgs = new SmsMessage[pdus.length];
                    for(int i=0; i<msgs.length; i++){
                        msgs[i] = SmsMessage.createFromPdu((byte[])pdus[i]);
                        msg_from = msgs[i].getOriginatingAddress();
                        String msgBody = msgs[i].getMessageBody();

                        if(msg_from.equals(phoneNumber)){
                            System.out.println(msgBody);
                            Toast.makeText(context, msg_from + ": " +msgBody, Toast.LENGTH_SHORT).show();
                            String[] bodies = msgBody.split("C");
                            String thermString = bodies[0];
                            String[] temp = thermString.split(":");
                            thermString = temp[1];

                            String ugrasString = bodies[1];
                            temp = ugrasString.split("%");
                            String temp1 = temp[1]; //Weight
                            ugrasString = temp[0];
                            temp = ugrasString.split(":");
                            ugrasString = temp[1];

                            String[] kg = temp1.split(" kg");
                            String temp2[] = kg[0].split(":");
                            String kgString = temp2[1];

                            double thermokrasia =  Double.parseDouble(thermString);
                            double ugrasia = Double.parseDouble(ugrasString);
                            double baros = Double.parseDouble(kgString);

                            // Instantiate the RequestQueue.
                            RequestQueue queue = Volley.newRequestQueue(context);
                            SharedPreferences settings = PreferenceManager.getDefaultSharedPreferences(context);
                            String user = settings.getString("username","null");
                            String ur = settings.getString("url", "127.0.0.1");
                            String url = "http://" + ur + "/thesis/android/handler.php?user=" + user;
                            String urlString = url + "&thermokrasia=" + thermokrasia + "&ugrasia=" + ugrasia + "&baros=" + baros;

                            // Request a string response from the provided URL.
                            StringRequest stringRequest = new StringRequest(Request.Method.POST, urlString,
                                    new Response.Listener<String>() {
                                        @Override
                                        public void onResponse(String response) {
                                            System.out.println("Response is: "+ response);
                                            Boolean check = false;
                                            if(response.equals("")) {
                                                check = true;
                                            }
                                        }
                                    }, new Response.ErrorListener() {
                                @Override
                                public void onErrorResponse(VolleyError error) {
                                    Toast t = Toast.makeText(context, error.toString(), Toast.LENGTH_SHORT);
                                    t.show();
                                }
                            });
                            // Add the request to the RequestQueue.
                            queue.add(stringRequest);
                        }
                    }
                }catch(Exception e){
                    e.printStackTrace();
                    System.out.println("ERROR: SMS: " + e);
                }
            }
        }
        else {
            Toast.makeText(context, "No access to SMS", Toast.LENGTH_SHORT).show();
        }
    }
}
