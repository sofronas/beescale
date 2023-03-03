package com.example.sofronas.ui.search;

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
import android.widget.Button;
import android.widget.CalendarView;
import android.widget.Toast;

import com.example.sofronas.MainActivity;
import com.example.sofronas.R;
import com.example.sofronas.ui.month.ShowDataMonth;

import java.sql.SQLOutput;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.util.Calendar;
import java.util.Date;
import java.util.Locale;

public class FragmentSearch extends Fragment implements View.OnClickListener {

    private Button searchDayBtn;
    private CalendarView calendar;
    private String curDate;
    private String curYear;
    private String curMonth;
    private String dateFromUser;

    public static FragmentSearch newInstance() {
        return new FragmentSearch();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        View myView = inflater.inflate(R.layout.fragment_search, container, false);
        calendar = (CalendarView) myView.findViewById(R.id.choose_day);
        calendar.setOnDateChangeListener(new CalendarView.OnDateChangeListener() {
            @Override
            public void onSelectedDayChange(CalendarView view, int year, int month, int dayOfMonth) {
                curDate = String.valueOf(dayOfMonth);
                curMonth = String.valueOf(month);
                curYear = String.valueOf(year);
                dateFromUser = curDate + "/" + curMonth + "/" + curYear;
            }
        });

        searchDayBtn = (Button) myView.findViewById(R.id.day_choose);
        searchDayBtn.setOnClickListener((View.OnClickListener) this);
        return myView;
    }

    //Call the showDataDay
    //If user doesn't provide any choice
    //default day -> today
    @Override
    public void onClick(View v) {
        if(curDate == null && curMonth == null && curYear == null){
            setToToday();
        }
        boolean moveOn = checkDate();
        if (moveOn == true) {
            Intent myIntent = new Intent((MainActivity)getActivity(), ShowDataDay.class);
            myIntent.putExtra("calendar_day_user", curDate);
            myIntent.putExtra("calendar_month_user", curMonth);
            myIntent.putExtra("calendar_year_user", curYear);
            startActivity(myIntent);
        } else {
            Toast.makeText(getActivity(),"Cannot continue!" ,Toast.LENGTH_SHORT).show();
        }
    }


    //if user is not choose anything
    //calendar view is set up default
    //to today so from null setup day
    public void setToToday(){
        Calendar c = Calendar.getInstance();
        SimpleDateFormat d = new SimpleDateFormat("dd/M/yyyy");
        String strDate = d.format(c.getTime());

        String[] textSplit =  strDate.toString().split("/");
        curDate = textSplit[0];
        curMonth = Integer.toString(Integer.parseInt(textSplit[1]) - 1);
        curYear = textSplit[2];
    }

    public boolean checkDate() {
        boolean good = true;
        //compare dates > today
        Calendar todayCal = Calendar.getInstance();
        Calendar userCal = Calendar.getInstance();

        Date dateToday = new Date();
        todayCal.setTime(dateToday);

        userCal.set(Calendar.DAY_OF_MONTH,Integer.parseInt(curDate));
        userCal.set(Calendar.MONTH, Integer.parseInt(curMonth));
        userCal.set(Calendar.YEAR, Integer.parseInt(curYear));


        Date dt = userCal.getTime();
//        System.out.println(dateToday);
//        System.out.println(dt);
        userCal.setTime(dt);

        if (userCal.after(todayCal)) {
//            System.out.println("User choice is after Today");
            Toast.makeText(getActivity(),"Are you come from future?" ,Toast.LENGTH_SHORT).show();
            good = false;
        }
        return good;
    }
}