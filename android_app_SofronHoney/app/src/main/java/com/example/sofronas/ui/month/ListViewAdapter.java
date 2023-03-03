package com.example.sofronas.ui.month;

import android.app.Activity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.sofronas.R;

import java.util.ArrayList;

public class ListViewAdapter extends BaseAdapter {

    public ArrayList<Model> dataList;
    Activity activity;

    public ListViewAdapter(Activity activity, ArrayList<Model> dataList) {
        super();
        this.activity = activity;
        this.dataList = dataList;
    }

    @Override
    public int getCount() {
        return dataList.size();
    }

    @Override
    public Object getItem(int position) {
        return dataList.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    private class ViewHolder {
        TextView mSNo;
        TextView mDate;
        TextView mTemp;
        TextView mHumd;
        TextView mWeight;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        ViewHolder holder;
        LayoutInflater inflater = activity.getLayoutInflater();

        if (convertView == null) {
            convertView = inflater.inflate(R.layout.list_view_row, null);
            holder = new ViewHolder();
            holder.mSNo = (TextView) convertView.findViewById(R.id.sNo);
            holder.mDate = (TextView) convertView.findViewById(R.id.date);
            holder.mTemp = (TextView) convertView.findViewById(R.id.temp);
            holder.mHumd = (TextView) convertView.findViewById(R.id.humd);
            holder.mWeight = (TextView) convertView.findViewById(R.id.weight);
            convertView.setTag(holder);
        } else {
            holder = (ViewHolder) convertView.getTag();
        }

        Model item = dataList.get(position);
        holder.mSNo.setText(item.getsNo().toString());
        holder.mDate.setText(item.getDate().toString());
        holder.mTemp.setText(item.getTemp().toString());
        holder.mHumd.setText(item.getHumd().toString());
        holder.mWeight.setText(item.getWeight().toString());

        return convertView;
    }
}