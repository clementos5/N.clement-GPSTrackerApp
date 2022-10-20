package com.tebuka.project.year.afinal.tebukapp;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.InputType;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Locale;

public class Make_Request extends AppCompatActivity implements View.OnClickListener, AdapterView.OnItemSelectedListener {
    private Make_Request_Database dbHelper ;
    EditText editTextName,editTextPhone,editTextEmail,editTextDate;
    Button link_to_google_map,request_detail;
    public static final SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd", Locale.ENGLISH);
    DatePickerDialog datePickerDialog;
    Calendar dateCalendar;
    String Name,Gender,Phone,Email,Date;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_make__request);

        editTextName = (EditText)findViewById(R.id.EditTextName);
        RadioGroup group=(RadioGroup) findViewById(R.id.EditTextGender);
        group.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup radioGroup, int i) {
                RadioButton myRb = (RadioButton) findViewById(i);
                Gender = myRb.getText().toString();

            }
        });
        editTextPhone = (EditText)findViewById(R.id.EditTextPhone);
        editTextEmail = (EditText) findViewById(R.id.EditTextEmail);
        editTextDate = (EditText) findViewById(R.id.EditTextDate);
        editTextDate.setInputType(InputType.TYPE_NULL);
        setListeners();

        dbHelper = new Make_Request_Database(this);

        link_to_google_map = (Button) findViewById(R.id.link_to_google_map);
        link_to_google_map.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                saveRequest();

                Intent i=new Intent(Make_Request.this,MapsLocationActivity.class);
                startActivity(i);
                overridePendingTransition(0,0);
                end();
            }
        });
        request_detail = (Button) findViewById(R.id.request_details);
        request_detail.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                RequestList();
            }
        });
    }
    public void end(){
        this.finish();
    }

    private void setListeners() {
        editTextDate.setOnClickListener(this);
        Calendar newCalendar = Calendar.getInstance();
        datePickerDialog = new DatePickerDialog(this,
                new DatePickerDialog.OnDateSetListener() {

                    public void onDateSet(DatePicker view, int year,
                                          int monthOfYear, int dayOfMonth) {
                        dateCalendar = Calendar.getInstance();
                        dateCalendar.set(year, monthOfYear, dayOfMonth);
                        editTextDate.setText(formatter.format(dateCalendar.getTime()));
                    }
                }, newCalendar.get(Calendar.YEAR),
                newCalendar.get(Calendar.MONTH),
                newCalendar.get(Calendar.DAY_OF_MONTH));
    }

    public void saveRequest(){
        Name = editTextName.getText().toString();
        Phone= editTextPhone.getText().toString();
        Email = editTextEmail.getText().toString();
        Date= editTextDate.getText().toString();

        dbHelper.save_request(Name,Gender,Phone,Email,Date);


    }
    public void RequestList(){
        android.support.v4.app.FragmentManager fragmentManager =getSupportFragmentManager();
        android.support.v4.app.FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();
        Request_Details_Fragment request_detailsFragment = new Request_Details_Fragment();
        fragmentTransaction.replace(R.id.fragment_container, request_detailsFragment);
        fragmentTransaction.commit();

    }
    @Override
    public void onSaveInstanceState(Bundle outState) {
        if (dateCalendar != null)
            outState.putLong("dateCalendar", dateCalendar.getTime().getTime());
    }

    @Override
    public void onClick(View v) {
        if (v == editTextDate) {
            datePickerDialog.show();
        }
    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
}
