package com.example.sofronas.ui.today;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.preference.PreferenceManager;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sofronas.GlobalClass;
import com.example.sofronas.R;

public class FragmentToday extends Fragment {

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_today, container, false);
        s(root);
        GlobalClass s = new GlobalClass();

        // Instantiate the RequestQueue.
        RequestQueue queue = Volley.newRequestQueue(getActivity());
        SharedPreferences settings = PreferenceManager.getDefaultSharedPreferences(getActivity());
        String ur = settings.getString("url", s.getHost());
        String us = settings.getString("username_id", "sof");
        String url = "http://" + ur + "/thesis/android/getToday.php?us=" +us;

        System.out.println(url);

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
                            TextView temp = (TextView)root.findViewById(R.id.texttemp);
                            ProgressBar tempBar = (ProgressBar)root.findViewById(R.id.progressBart);
                            try {
                                Float te = Float.parseFloat(data[0]);
                                Integer k = te.intValue();
                                tempBar.setProgress(k);
                            } catch (NumberFormatException e) {
                                tempBar.setProgress(Integer.parseInt(data[0]));
                            }
                            temp.setText(data[0] + " " + (char) 0x00B0+"C");

                            TextView hum = (TextView)root.findViewById(R.id.text_hum);
                            ProgressBar humBar = (ProgressBar)root.findViewById(R.id.progressBarh);
                            try {
                                Float hu = Float.parseFloat(data[1]);
                                Integer h = hu.intValue();
                                humBar.setProgress(h);
                            } catch (NumberFormatException e){
                                humBar.setProgress(Integer.parseInt(data[1]));
                            }
                            hum.setText(data[1] + " %");

                            TextView wei = (TextView)root.findViewById(R.id.text_wei);
                            ProgressBar weiBar = (ProgressBar)root.findViewById(R.id.progressBarw);
                            try{
                                Float tem = Float.parseFloat(data[2]);
                                Integer i = tem.intValue();
                                weiBar.setProgress(i);
                            } catch (NumberFormatException e) {
                                weiBar.setProgress(Integer.parseInt(data[2]));
                            }
                            wei.setText(data[2] + " kg");
                        } else {
                            TextView temp = (TextView)root.findViewById(R.id.texttemp);
                            ProgressBar tempBar = (ProgressBar)root.findViewById(R.id.progressBart);
                            tempBar.setProgress(0);
                            temp.setText("-");

                            TextView hum = (TextView)root.findViewById(R.id.text_hum);
                            ProgressBar humBar = (ProgressBar)root.findViewById(R.id.progressBarh);
                            humBar.setProgress(0);
                            hum.setText("-");

                            TextView wei = (TextView)root.findViewById(R.id.text_wei);
                            ProgressBar weiBar = (ProgressBar)root.findViewById(R.id.progressBarw);
                            weiBar.setProgress(0);
                            wei.setText("-");
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                System.out.println("Error: "+ error);
                System.out.println("That didn't work!");
                TextView temp = (TextView)root.findViewById(R.id.texttemp);
                ProgressBar tempBar = (ProgressBar)root.findViewById(R.id.progressBart);
                tempBar.setProgress(0);
                temp.setText("-");

                TextView hum = (TextView)root.findViewById(R.id.text_hum);
                ProgressBar humBar = (ProgressBar)root.findViewById(R.id.progressBarh);
                humBar.setProgress(0);
                hum.setText("-");

                TextView wei = (TextView)root.findViewById(R.id.text_wei);
                ProgressBar weiBar = (ProgressBar)root.findViewById(R.id.progressBarw);
                weiBar.setProgress(0);
                wei.setText("-");

                Toast t = Toast.makeText(root.getContext(), error.toString(), Toast.LENGTH_SHORT);
                t.show();
            }
        });

        // Add the request to the RequestQueue.
        queue.add(stringRequest);

        return root;
    }

    private void s(View root){
        TextView temp = (TextView)root.findViewById(R.id.texttemp);
        ProgressBar tempBar = (ProgressBar)root.findViewById(R.id.progressBart);
        tempBar.setProgress(0);
        temp.setText("-");

        TextView hum = (TextView)root.findViewById(R.id.text_hum);
        ProgressBar humBar = (ProgressBar)root.findViewById(R.id.progressBarh);
        humBar.setProgress(0);
        hum.setText("-");

        TextView wei = (TextView)root.findViewById(R.id.text_wei);
        ProgressBar weiBar = (ProgressBar)root.findViewById(R.id.progressBarw);
        weiBar.setProgress(0);
        wei.setText("-");
    }
}