package com.example.sofronas.login;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sofronas.MainActivity;
import com.example.sofronas.R;


public class LoginActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        setTitle(R.string.login_name);

        ActionBar actionBar = getSupportActionBar();

        actionBar.setDisplayShowHomeEnabled(true);
        actionBar.setIcon(R.mipmap.app_icon);

        Button loginBtn = (Button) findViewById(R.id.btnLoginId);
        loginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                EditText usernameText = (EditText) findViewById(R.id.usernameIdText);
                EditText passwordText = (EditText) findViewById(R.id.passowrdText);
//                System.out.println("login pressed");

                checkDataToLogin(usernameText,passwordText);
            }
        });
        Button cancelBtn = (Button) findViewById(R.id.cancelLoginId);
        cancelBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            //close app
            public void onClick(View view) {
                finishAffinity();
                System.exit(0);
            }
        });
    }

    private void checkDataToLogin(EditText username, EditText password){

        String us =  username.getText().toString();
        String ps = password.getText().toString();

        if(us.isEmpty() && ps.isEmpty()){
            System.out.println("Fill data please");
        }
        if(us.isEmpty()){
            System.out.println("Username cannot be empty");
        }
        if(ps.isEmpty()) {
            System.out.println("Password cannot be empty");
        }
        if((!ps.isEmpty()) && (!us.isEmpty())){
            System.out.println("Username: " + us + "\nPassword: " + ps);
            boolean isReal = checkDB(us,ps);
        }
    }

    private boolean checkDB(String us, String ps){
        RequestQueue queue = Volley.newRequestQueue(this);
        //String ur = settings.getString("url", "127.0.0.1");
        //String url = "http://" + ur + "/thesis/check_login.php";
        String url = "http://192.168.1.6/thesis/check_login.php?username=" + us + "&password=" + ps;
//        System.out.println(url);
        // Request a string response from the provided URL.
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        // Display the first 500 characters of the response string.
//                        System.out.println("Response is: "+ response);
                        if(response.equals("1")){
//                            System.out.println("Login success");
                            Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                            startActivity(intent);
                            finish();
                        } else{
                            Context context = getApplicationContext();
                            CharSequence text = "Λάθος Δεδομένα";
                            int duration = Toast.LENGTH_LONG;

                            Toast toast = Toast.makeText(context, text, duration);
                            toast.show();
                            System.out.println("toast shown()");
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                System.out.println("Error: "+ error);
                Context context = getApplicationContext();
                CharSequence text = "O σέρβερ είναι εκτός λειτουργίας.";
                int duration = Toast.LENGTH_LONG;
                Toast toast = Toast.makeText(context, text, duration);
                toast.show();
            }
        });

        // Add the request to the RequestQueue.
        queue.add(stringRequest);
        return false;
    }
}