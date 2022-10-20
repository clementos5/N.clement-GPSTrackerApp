package com.tebuka.project.year.afinal.tebukapp;

import android.app.DatePickerDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.text.Editable;
import android.text.InputType;
import android.text.TextUtils;
import android.text.TextWatcher;
import android.util.Log;
import android.view.Display;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;

import static com.tebuka.project.year.afinal.tebukapp.R.color.colorAccent;
import static com.tebuka.project.year.afinal.tebukapp.R.color.colorPrimary;

public class Register_your_Car_Fragment extends Fragment
        implements View.OnClickListener, AdapterView.OnItemSelectedListener{
    public static final SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd", Locale.ENGLISH);
    DatePickerDialog datePickerDialog;
    Calendar dateCalendar;
    EditText Edit_Car_Name,Edit_Car_Start_Date,Edit_Car_Location;
    Button regCar;
    View view;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        view=inflater.inflate(R.layout.fragment_register_your__car, container, false);

        Edit_Car_Name=(EditText) view.findViewById(R.id.car_name);
        Edit_Car_Start_Date=(EditText) view.findViewById(R.id.car_start_date);
        Edit_Car_Start_Date.setInputType(InputType.TYPE_NULL);
        setListeners();

        regCar = (Button) view.findViewById(R.id.reg_car);
        regCar.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                register_car();
            }
        });
        Edit_Car_Location=(EditText) view.findViewById(R.id.car_location);

        //
        Edit_Car_Name.addTextChangedListener(new MyTextWatcher(Edit_Car_Name));
        Edit_Car_Start_Date.addTextChangedListener(new MyTextWatcher(Edit_Car_Start_Date));
        Edit_Car_Location.addTextChangedListener(new MyTextWatcher(Edit_Car_Location));


        return view;
    }

    private void setListeners() {
        Edit_Car_Start_Date.setOnClickListener(this);
        Calendar newCalendar = Calendar.getInstance();
        datePickerDialog = new DatePickerDialog(this.getActivity(),
                new DatePickerDialog.OnDateSetListener() {

                    public void onDateSet(DatePicker view, int year,
                                          int monthOfYear, int dayOfMonth) {
                        dateCalendar = Calendar.getInstance();
                        dateCalendar.set(year, monthOfYear, dayOfMonth);
                        Edit_Car_Start_Date.setText(formatter.format(dateCalendar.getTime()));

                    }
                }, newCalendar.get(Calendar.YEAR),
                newCalendar.get(Calendar.MONTH),
                newCalendar.get(Calendar.DAY_OF_MONTH));

    }

    @Override
    public void onSaveInstanceState(Bundle outState) {
        if (dateCalendar != null)
            outState.putLong("dateCalendar", dateCalendar.getTime().getTime());
        }
    @Override
    public void onClick(View v) {
        if (v == Edit_Car_Start_Date) {
            datePickerDialog.show();

        }
    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

    public void  register_car(){

        if (!validateCarName())
        {
            return;
        }
        else if (!validateCarStartDate())
        {
            return;
        }
        else if (!validateCarLocation())
        {
            return;
        }
        else {
            String url = "http://192.168.56.1/Tebuka/register_car.php";
            RequestQueue queue = Volley.newRequestQueue(this.getActivity());
            StringRequest postRequest = new StringRequest(Request.Method.POST, url,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            // response
                            Log.d("Response", response);
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            // error
                            Log.d("Error.Response", error.toString());
                        }
                    }
            ) {
                @Override
                protected Map<String, String> getParams() {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("Car_Name", Edit_Car_Name.getText().toString());
                    params.put("Car_Date", Edit_Car_Start_Date.getText().toString());
                    params.put("Car_Status", Edit_Car_Location.getText().toString());

                    return params;
                }

            };
            queue.add(postRequest);
            switchNext();
        }
    }

    public void switchNext(){
        /*android.support.v4.app.FragmentManager fragmentManager =getActivity().getSupportFragmentManager();
        android.support.v4.app.FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();
        GoogleMap_fragment googleMapFragment = new GoogleMap_fragment();
        fragmentTransaction.replace(R.id.fragment_container, googleMapFragment);
        fragmentTransaction.commit();*/

        Intent intent = new Intent(getActivity(),MapsLocationActivity.class);
        startActivity(intent);
    }

    //CarName
    private boolean validateCarName() {
        if (Edit_Car_Name.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Fill in Name of Car",Toast.LENGTH_SHORT).show();
            requestFocus(Edit_Car_Name);
            return false;
        } else {
        }
        return true;
    }
    //CarStartDAte
    private boolean validateCarStartDate() {
        if (Edit_Car_Start_Date.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Fill in Starting Date",Toast.LENGTH_SHORT).show();
            requestFocus(Edit_Car_Start_Date);
            return false;
        } else {
        }
        return true;
    }

    //CarLocation
    private boolean validateCarLocation() {
        if (Edit_Car_Location.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Fill in Car Location",Toast.LENGTH_SHORT).show();
            requestFocus(Edit_Car_Location);
            return false;
        } else {
        }
        return true;
    }
    private void requestFocus(View view) {
        if (view.requestFocus()) {
            getActivity().getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_VISIBLE);
        }
    }



    private class MyTextWatcher implements TextWatcher {

        private View view;

        private MyTextWatcher(View view) {
            this.view = view;
        }

        public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {
        }

        public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {
        }

        public void afterTextChanged(Editable editable) {
            switch (view.getId()) {
                case R.id.car_name:
                    validateCarName();
                    break;
                case R.id.car_start_date:
                    validateCarStartDate();
                    break;
                case R.id.car_location:
                    validateCarLocation();
                    break;

            }
        }
    }

}
