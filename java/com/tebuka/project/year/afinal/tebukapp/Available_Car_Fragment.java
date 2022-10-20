package com.tebuka.project.year.afinal.tebukapp;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.Toast;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.kosalgeek.android.json.JsonConverter;

import java.util.ArrayList;

public class Available_Car_Fragment extends Fragment {
    ArrayList<Car> carList;
    private RecyclerView rvCar;
    final String TAG = "ShowActivity";
    public final static String KEY_ID = "KEY_ID";

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_available__car_, container, false);


        rvCar = (RecyclerView) view.findViewById(R.id.list_of_car);
        rvCar.setHasFixedSize(true);

        RecyclerView.LayoutManager manager = new LinearLayoutManager(getActivity());

        rvCar.setLayoutManager(manager);
        String url = "http://192.168.56.1/Tebuka/android_all_carJson.php";
        StringRequest stringRequest = new StringRequest(
                url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.d(TAG, response);

                        carList = new JsonConverter<Car>()
                                .toArrayList(response, Car.class);

                        Car_Adapter adapter = new Car_Adapter(getActivity(), carList);
                        adapter.notifyDataSetChanged();
                        rvCar.setAdapter(adapter);
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        if (error != null) {
                            Log.d(TAG, error.toString());
                            Toast.makeText(getActivity(), "Something went wrong.", Toast.LENGTH_LONG).show();
                        }
                    }
                }
        );

        MyCar.getInstance(getActivity()).addToRequestQueue(stringRequest);

        rvCar.addOnItemTouchListener(
                new RecyclerItemClickListener(getActivity(), new RecyclerItemClickListener.OnItemClickListener() {
                    @Override
                    public void onItemClick(View view, int position) {

                        Car car = carList.get(position);
                        Intent i = new Intent(getActivity(), Make_Request.class);
                        //send the id to the next activity to use it to retrieve food details
                        i.putExtra(KEY_ID, car.car_id);
                        startActivity(i);
                        getActivity().overridePendingTransition(0,0);
                        end();
                    }
                })
        );
        return view;

    }
    public void end(){
        MainActivity mainActivity=new MainActivity();
        mainActivity.finish();
    }

}
