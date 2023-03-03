package com.example.sofronas.ui.week;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.ProgressBar;
import android.widget.RelativeLayout;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.constraintlayout.widget.ConstraintLayout;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProvider;
import androidx.preference.PreferenceManager;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sofronas.R;

import org.w3c.dom.Text;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class FragmentWeek extends Fragment {

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_week, container, false);
//        s(root);

        // Instantiate the RequestQueue.
        RequestQueue queue = Volley.newRequestQueue(getActivity());
        SharedPreferences settings = PreferenceManager.getDefaultSharedPreferences(getActivity());
        String ur = settings.getString("url", "127.0.0.1");
        String us = settings.getString("username_id", "sof");
        String url = "http://" + ur + "/thesis/android/getWeek.php?us=" + us;

        float textSize = 16;
        // Request a string response from the provided URL.
        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
//                        System.out.println("Response is: "+ response);
                        Boolean check = false;
                        if(response.equals("")) {
                            check = true;
                            s(root);
                        }
                        if(check == false) {
                            String[] data = response.toString().split("<tr>");
                            int start, end;
                            List<String> daysOfWeek = new ArrayList<>();
                            List<String> tempOfWeek = new ArrayList<>();
                            List<String> humOfWeek = new ArrayList<>();
                            List<String> weiOfWeek = new ArrayList<>();
                            for (int i =1; i < data.length; i++){
                                start = data[i].indexOf("<td>") + 4;
                                end = data[i].indexOf("</td>");
                                String day = data[i].substring(start,end);
                                daysOfWeek.add(day);
                                String[] rest = data[i].split("<td>"+day+"</td>");
                                String[] res = rest[1].split("</tr>");
                                String[] re = res[0].split("</td>");
                                String[] temp = re[0].split("<td>");
                                tempOfWeek.add(temp[1]);
                                String[] hum = re[1].split("<td>");
                                humOfWeek.add(hum[1]);
                                String[] wei = re[2].split("<td>");
                                weiOfWeek.add(wei[1]);
                            }
                            int x = daysOfWeek.size();
                            ConstraintLayout main = (ConstraintLayout)root.findViewById(R.id.constrait_week);
                            TableLayout table = (TableLayout)root.findViewById(R.id.table_week_id);
                            //header row table 
                            TextView num = new TextView(root.getContext());
                            num.setText("#");

                            num.setTextSize(textSize);
                            
                            TextView imerominia = new TextView(root.getContext());
                            imerominia.setText("Ημερομηνία  ");
                            imerominia.setTextSize(textSize);
                            
                            TextView therm = new TextView(root.getContext());
                            therm.setText("Θερμοκρασία  ");
                            therm.setTextSize(textSize);
                            
                            TextView ygras = new TextView(root.getContext());
                            ygras.setText("Υγρασία  ");
                            ygras.setTextSize(textSize);
                            
                            TextView bar = new TextView(root.getContext());
                            bar.setText("Βάρος");
                            bar.setTextSize(textSize);

                            TableRow r = new TableRow(root.getContext());
                            r.addView(num);
                            r.addView(imerominia);
                            r.addView(therm);
                            r.addView(ygras);
                            r.addView(bar);
                            r.setGravity(Gravity.CENTER);
                            table.addView(r);

//                            TableLayout table = new TableLayout(root.getContext());
                            for(int i=0; i<x; i++){
                                TableRow row = new TableRow(root.getContext());

                                TextView number = new TextView(root.getContext());
                                number.setText("" + (x-i) + "  ");
                                System.out.println(i);
                                number.setTextSize(textSize);
                                number.setGravity(Gravity.CENTER);

                                TextView tv = new TextView(root.getContext());
                                tv.setText(daysOfWeek.get(i) + " ");
                                tv.setTextSize(textSize);
                                tv.setGravity(Gravity.CENTER);

                                char c = 0x00B0; //symbol of Celsius
                                TextView tv1 = new TextView(root.getContext());
                                tv1.setText("" + tempOfWeek.get(i) + " " + c + " C");
                                tv1.setTextSize(textSize);
                                tv1.setGravity(Gravity.CENTER);

                                TextView tv2 = new TextView(root.getContext());
                                tv2.setText(" " + humOfWeek.get(i) + " % ");
                                tv2.setTextSize(textSize);
                                tv2.setGravity(Gravity.CENTER);

                                TextView tv3 = new TextView(root.getContext());
                                tv3.setText(" " + weiOfWeek.get(i) + " kg");
                                tv3.setTextSize(textSize);
                                tv3.setGravity(Gravity.CENTER);

                                row.addView(number);
                                row.addView(tv);
                                row.addView(tv1);
                                row.addView(tv2);
                                row.addView(tv3);
                                row.setGravity(Gravity.CENTER);
                                table.addView(row);
                            }
                            //main.addView(table);
                        } else if(check == true){
                            TextView nod = (TextView)root.findViewById(R.id.week_text_nodata);
                            nod.setText(R.string.week_text_no_data);
                            nod.setGravity(Gravity.CENTER);
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                System.out.println("Error: "+ error);
                System.out.println("That didn't work!");
                TextView nod = (TextView)root.findViewById(R.id.week_text_nodata);
                nod.setText(R.string.error);
                nod.setGravity(Gravity.CENTER);

                Toast t = Toast.makeText(root.getContext(), error.toString(), Toast.LENGTH_SHORT);
                t.show();
            }
        });

        // Add the request to the RequestQueue.
        queue.add(stringRequest);
        return root;
    }

    private void s(View root){
        TextView nod = (TextView)root.findViewById(R.id.week_text_nodata);
        nod.setText(R.string.error);
        nod.setGravity(Gravity.CENTER);
    }
}