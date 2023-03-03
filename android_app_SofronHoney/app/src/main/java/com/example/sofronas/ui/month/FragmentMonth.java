package com.example.sofronas.ui.month;

import androidx.lifecycle.ViewModelProvider;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.sofronas.MainActivity;
import com.example.sofronas.R;

public class FragmentMonth extends Fragment implements View.OnClickListener {

    public static FragmentMonth newInstance() {
        return new FragmentMonth();
    }

    private Button searchMonthBtn;
    private Spinner mySpinner;

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,@Nullable Bundle savedInstanceState) {
        View myView = inflater.inflate(R.layout.fragment_month, container, false);
        mySpinner = (Spinner) myView.findViewById(R.id.list_of_months);
        searchMonthBtn = (Button) myView.findViewById(R.id.month_choose);
        searchMonthBtn.setOnClickListener((View.OnClickListener) this);
        return myView;
    }

    //Call the showDataMonth
    //If user doesn't provide any choice
    //default month -> January
    @Override
    public void onClick(View v) {
        String user_month = mySpinner.getSelectedItem().toString();
        Intent myIntent = new Intent((MainActivity)getActivity(), ShowDataMonth.class);
        myIntent.putExtra("USER_MONTH_CHOICE", user_month);
        int num = 0;

        if(user_month.equals("Ιανουάριος")) {
            num = 1;
        }
        if(user_month.equals("Φεβρουάριος")) {
            num = 2;
        }
        if(user_month.equals("Μάρτιος")) {
            num = 3;
        }
        if(user_month.equals("Απρίλιος")) {
            num = 4;
        }
        if(user_month.equals("Μάιος")) {
            num = 5;
        }
        if(user_month.equals("Ιούνιος")) {
            num = 6;
        }
        if(user_month.equals("Ιούλιος")) {
            num = 7;
        }
        if(user_month.equals("Αύγουστος")) {
            num = 8;
        }
        if(user_month.equals("Σεπτέμβριος")) {
            num = 9;
        }
        if(user_month.equals("Οκτώβριος")) {
            num = 10;
        }
        if(user_month.equals("Νοέμβριος")) {
            num = 11;
        }
        if(user_month.equals("Δεκέμβριος")) {
            num = 12;
        }
        myIntent.putExtra("USER_MONTH_INT", num);
        startActivity(myIntent);
    }
}