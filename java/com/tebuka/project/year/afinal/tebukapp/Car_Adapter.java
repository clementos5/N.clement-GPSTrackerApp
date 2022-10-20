package com.tebuka.project.year.afinal.tebukapp;

import android.content.Context;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by ClementN on 4/14/2017.
 */

public class Car_Adapter extends  RecyclerView.Adapter<Car_Adapter.RoomViewHolder> {
private Context context;
private ArrayList<Car> cars;
public Car_Adapter(Context context, ArrayList<Car> cars) {
        this.context = context;
        this.cars = cars;
        }
@Override
public RoomViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View view = inflater.from(parent.getContext())
        .inflate(R.layout.car_row_layout, parent, false);
        RoomViewHolder FoodViewHolder = new RoomViewHolder(view);
        return FoodViewHolder;
        }

@Override
public void onBindViewHolder(RoomViewHolder holder, int position) {
        Car car = cars.get(position);
        holder.carname.setText(car.car_name);
        holder.carlocation.setText(car.car_location);
        }

@Override
public int getItemCount() {
        if (cars != null) {
        return cars.size();
        }
        return 0;
        }


//ViewHolder class
public static class RoomViewHolder extends RecyclerView.ViewHolder {

    public CardView cvCar;
    public TextView carname, carlocation;

    public RoomViewHolder(View v) {
        super(v);
        cvCar = (CardView) v.findViewById(R.id.card_view);
        carname = (TextView) v.findViewById(R.id.carname);
        carlocation = (TextView) v.findViewById(R.id.carlocation);

    }
  }
}