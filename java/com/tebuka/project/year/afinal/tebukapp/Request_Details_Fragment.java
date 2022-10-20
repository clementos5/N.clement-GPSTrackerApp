package com.tebuka.project.year.afinal.tebukapp;

import android.database.Cursor;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SimpleCursorAdapter;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;


public class Request_Details_Fragment extends Fragment {
    public  SimpleCursorAdapter cursorAdapter;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view= inflater.inflate(R.layout.fragment_request__details, container, false);

        Make_Request_Database dbHelper = new Make_Request_Database(getActivity());

        final Cursor cursor = dbHelper.get_request_details();
        String[] from = new String[]{
                "_id",
                "name",
                "gender",
                "phone",
                "email",
                "date"
        };
        int[] to = new int[]{
                R.id.id,
                R.id.name,
                R.id.gender,
                R.id.phone,
                R.id.lgnemail,
                R.id.date
        };

        cursorAdapter = new SimpleCursorAdapter(getActivity(), R.layout.request_layout_row,
                cursor, from, to, 0);
        ListView listView = (ListView)view.findViewById(R.id.listView1);
        listView.setAdapter(cursorAdapter);

        return view;

    }

    }


