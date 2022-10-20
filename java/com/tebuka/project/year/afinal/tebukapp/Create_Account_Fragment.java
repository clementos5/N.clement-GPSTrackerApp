package com.tebuka.project.year.afinal.tebukapp;

import android.app.Activity;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.text.Editable;
import android.text.TextUtils;
import android.text.TextWatcher;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;


import java.util.HashMap;
import java.util.Map;

public class Create_Account_Fragment extends Fragment{
    //define views.
    EditText Name,Phone,Email,Location,License,Plaque,Password,Confirm;
    String SelectedStatus,genderSelected;
    RadioGroup group;
    Button create_account_Button, reset_account_Button;

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_create__account, container, false);

        final Spinner spinner = (Spinner)view.findViewById(R.id.spinner_status);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this.getActivity(), R.array.status, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {

            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                SelectedStatus = parent.getItemAtPosition(position).toString();

            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {


            }
        });
        group = (RadioGroup)view.findViewById(R.id.gender);
        group.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup radioGroup, int i) {
                RadioButton myRb = (RadioButton) group.findViewById(i);
                genderSelected = myRb.getText().toString();

            }
        });

        Name = (EditText) view.findViewById(R.id.name);
        Phone = (EditText) view.findViewById(R.id.phone);
        Email = (EditText) view.findViewById(R.id.lgnemail);
        Location = (EditText) view.findViewById(R.id.location);
        License = (EditText) view.findViewById(R.id.drivinglicense);
        Plaque = (EditText) view.findViewById(R.id.plaque);
        Password=(EditText) view.findViewById(R.id.pswd) ;
        Confirm=(EditText) view.findViewById(R.id.pswdconfirm);

        Name.addTextChangedListener(new  MyTextWatcher(Name));
        Phone.addTextChangedListener(new MyTextWatcher(Phone));
        Email.addTextChangedListener(new MyTextWatcher(Email));
        Location.addTextChangedListener(new MyTextWatcher(Location));
        License.addTextChangedListener(new MyTextWatcher(License));
        Plaque.addTextChangedListener(new MyTextWatcher(Plaque));
        Password.addTextChangedListener(new MyTextWatcher(Password));
        Confirm.addTextChangedListener(new MyTextWatcher(Confirm));





        create_account_Button = (Button)view. findViewById(R.id.btn_create_account);
        create_account_Button.setOnClickListener(new View.OnClickListener() {
              @Override
              public void onClick(View view){
                      create_account();
              }
        });
        reset_account_Button = (Button)view. findViewById(R.id.btn_reset_account);
        reset_account_Button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view){
                android.support.v4.app.FragmentManager fragmentManager = getFragmentManager();
                android.support.v4.app.FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();
                Create_Account_Fragment create_account_fragment = new Create_Account_Fragment();
                fragmentTransaction.replace(R.id.fragment_container, create_account_fragment);
                fragmentTransaction.commit();
            }
        });
        return view;

    }
    private void create_account() {
        if (!validateName())
        {
            return;
        }
        else if (!validatePhone())
        {
            return;
        }
        else if (!validateEmail())
        {
            return;
        }
        else if (!validateLocation())
        {
            return;
        }
        else if (!validateLicense())
        {
            return;
        }
        else if (!validatePlaque())
        {
            return;
        }
        else if (!validatePassword())
        {
            return;
        }
        else if (!validateConfirm()) {
            return;
        }
        else
        {
            if (validatePassword() && validateConfirm())
            {
                final String p=Password.getText().toString();
                final String c=Confirm.getText().toString();
                if(!p.equals(c)){
                    Toast.makeText(getActivity(),"Password Not Correct",Toast.LENGTH_SHORT).show();
                    Password.getText().clear();
                    Confirm.getText().clear();

                }
                else
                {

                    String url = "http://192.168.56.1/Tebuka/create_new_account.php";
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
                            params.put("Name", Name.getText().toString());
                            params.put("Gender", genderSelected);
                            params.put("Status", SelectedStatus);
                            params.put("Phone", Phone.getText().toString());
                            params.put("Email", Email.getText().toString());
                            params.put("Location", Location.getText().toString());
                            params.put("License", License.getText().toString());
                            params.put("Plaque", Plaque.getText().toString());
                            params.put("Password", Password.getText().toString());

                            return params;
                        }

                    };
                    queue.add(postRequest);
                    nextFragment();

                }

            }
        }
    }

    public void nextFragment(){
        Toast.makeText(getActivity(), "Account created", Toast.LENGTH_SHORT).show();
        android.support.v4.app.FragmentManager fragmentManager = getFragmentManager();
        android.support.v4.app.FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();
        Register_your_Car_Fragment register_your_carFragment = new Register_your_Car_Fragment();
        fragmentTransaction.replace(R.id.fragment_container, register_your_carFragment);
        fragmentTransaction.commit();

    }
//Name
    private boolean validateName() {
        if (Name.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Fill in Name please",Toast.LENGTH_SHORT).show();
            requestFocus(Name);
            return false;
        } else {
        }
        return true;
    }
    //Phone
    private boolean validatePhone() {
        if (Phone.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Fill in Phone Address",Toast.LENGTH_SHORT).show();
            requestFocus(Phone);
            return false;
        } else {
        }
        return true;
    }
    //Email
    private boolean validateEmail() {
        String email = Email.getText().toString().trim();
        if (email.isEmpty() || !isValidEmail(email)) {
            //Toast.makeText(getActivity(),"Enter Valid Email",Toast.LENGTH_SHORT).show();
            requestFocus(Email);
            return false;
        } else {
        }
        return true;
    }
   //Location
   private boolean validateLocation() {
       if (Location.getText().toString().trim().isEmpty()) {
           Toast.makeText(getActivity(),"Enter Location",Toast.LENGTH_SHORT).show();
           requestFocus(Location);
           return false;
       } else {
       }
       return true;
   }

    //lICENSE
    private boolean validateLicense() {
        if (License.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Fill in Valid License",Toast.LENGTH_SHORT).show();
            requestFocus(License);
            return false;
        } else {
        }
        return true;
    }

    //PLAQUE
    private boolean validatePlaque() {
        if (Plaque.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Fill in Valid Plaque",Toast.LENGTH_SHORT).show();
            requestFocus(Plaque);
            return false;
        } else {
        }
        return true;
    }
    //PASSWORD
    private boolean validatePassword() {
        if (Password.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Enter PassWord PLease!",Toast.LENGTH_SHORT).show();
            requestFocus(Password);
            return false;
        } else {
        }
        return true;
    }
    //CONFIRM
    private boolean validateConfirm() {
        if (Confirm.getText().toString().trim().isEmpty()) {
            Toast.makeText(getActivity(),"Re_Enter PassWord",Toast.LENGTH_SHORT).show();
            requestFocus(Confirm);
            return false;
        } else {
        }
        return true;
    }



    private static boolean isValidEmail(String email) {
        return !TextUtils.isEmpty(email) && android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches();
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
                case R.id.name:
                    validateName();
                    break;
                case R.id.phone:
                    validatePhone();
                    break;
                case R.id.lgnemail:
                    validateEmail();
                    break;
                case R.id.location:
                    validateLocation();
                    break;
                case R.id.drivinglicense:
                    validateLicense();
                    break;
                case R.id.pswd:
                    validatePassword();
                    break;
                case R.id.pswdconfirm:
                    validateConfirm();
                    break;
            }
        }
    }

}

