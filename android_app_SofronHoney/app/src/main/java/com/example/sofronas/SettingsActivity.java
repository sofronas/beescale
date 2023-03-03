package com.example.sofronas;

import android.app.Activity;
import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.text.InputType;
import android.text.method.PasswordTransformationMethod;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.app.AppCompatDelegate;
import androidx.preference.EditTextPreference;
import androidx.preference.PreferenceFragmentCompat;
import androidx.preference.PreferenceManager;

public class SettingsActivity extends AppCompatActivity implements SharedPreferences.OnSharedPreferenceChangeListener {

    private com.example.sofronas.GlobalClass globalVariable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.settings_activity);

        if (savedInstanceState == null) {
            getSupportFragmentManager()
                    .beginTransaction()
                    .replace(R.id.settings, new SettingsFragment())
                    .commit();
        }
        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null) {
            actionBar.setDisplayHomeAsUpEnabled(true);
        }

        actionBar.setTitle(R.string.action_settings);
        SharedPreferences settings = PreferenceManager.getDefaultSharedPreferences(this);

        loadSettings(settings);

    }

    //For setup theme
    public static Boolean getDefaultDark(Context context) {
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        Boolean dark_theme = preferences.getBoolean("dark_mode_on",false);
        return dark_theme;
    }

    //For setup phone SMS
    public static String getPhoneNumber(String key, Context context){
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String phone = preferences.getString(key,null);
        return phone;
    }

    public static String getPhone(Context context) {
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String phone = preferences.getString("phone_number_key","0123456789");
        return phone;
    }
    public static String getUsername(Context context) {
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String phone = preferences.getString("username","sof");
        return phone;
    }
    public static String getPassword(Context context) {
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String phone = preferences.getString("password","kostas");
        return phone;
    }
    public static String getHost(Context context) {
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String phone = preferences.getString("url","http://localhost/thesis/android");
        return phone;
    }

    // For username to init the app
    public static String getUsername(String key, Context context){
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String username = preferences.getString(key,null);
        return username;
    }

    // For password to init the app
    public static String getPassword(String key, Context context){
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String password = preferences.getString(key,null);
        return password;
    }

    // For host url
    public static String getHost(String key, Context context){
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        String url = preferences.getString(key,null);
        return url;
    }

    public void loadSettings(SharedPreferences settings) {
        //Read Data
        settings.registerOnSharedPreferenceChangeListener(this);

        Boolean dark_theme = settings.getBoolean("dark_mode_on", false);
        if (dark_theme == Boolean.TRUE) {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_YES);
        } else {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO);
        }
        globalVariable = new GlobalClass();
        globalVariable.setDark_theme(dark_theme);

        String phoneNumber = settings.getString("phone_number_key","");
//        settings.edit().putString("phone_number_key", editTextPreference.getText()).apply();

    }

    @Override
    public void onSharedPreferenceChanged(SharedPreferences sharedPreferences, String key) {
        Boolean dark_theme = sharedPreferences.getBoolean("dark_mode_on", false);
//        String text = sharedPreferences.getString("dark_mode_on","");
        if (dark_theme == Boolean.TRUE) {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_YES);
//            dark_theme.setSummary
        } else {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO);
        }
    }

   // return settings to init the app
    public SharedPreferences sharedPreferences() {
        SharedPreferences settings = PreferenceManager.getDefaultSharedPreferences(this);
        return settings;
    }

    public static class SettingsFragment extends PreferenceFragmentCompat {
        @Override
        public void onCreatePreferences(Bundle savedInstanceState, String rootKey) {
            setPreferencesFromResource(R.xml.root_preferences, rootKey);
        }
    }

    // Return back to home page
    public boolean onOptionsItemSelected(MenuItem item){

        switch(item.getItemId()){
            case android.R.id.home:
                finish();
                return true;
        }
        return super.onOptionsItemSelected(item);
    }

//    @Override
//    protected void onStop() {
//        super.onStop();
//        PreferenceManager.getDefaultSharedPreferences(this)
//                .unregisterOnSharedPreferenceChangeListener(this);
//    }
}