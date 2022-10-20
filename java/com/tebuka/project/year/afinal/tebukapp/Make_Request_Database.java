package com.tebuka.project.year.afinal.tebukapp;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.widget.Toast;

    public class Make_Request_Database extends SQLiteOpenHelper {
        private Context context;

        public Make_Request_Database(Context context) {
            super(context, "RequestsDB.db" , null, 9);
            this.context = context;
        }

        @Override
        public void onCreate(SQLiteDatabase db) {
            try {
                String CREATE_STUDENT_TABLE =  "CREATE TABLE " + "Request" + "(" +
                        "_id" + " INTEGER PRIMARY KEY, " +
                        "name" + " TEXT, " +
                        "gender" + " TEXT, " +
                        "phone" + " TEXT, " +
                        "email" + " TEXT, " +
                        "date" + " TEXT); ";
                db.execSQL(CREATE_STUDENT_TABLE);
                Toast.makeText(context, "Databe created Called", Toast.LENGTH_LONG);
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }

        @Override
        public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
            db.execSQL("DROP TABLE IF EXISTS " + "Request");
            onCreate(db);
            Toast.makeText(context, "onUpgrade is Called", Toast.LENGTH_SHORT);
        }

        public boolean save_request(String name, String gender, String phone, String email, String date) {
            SQLiteDatabase db = this.getWritableDatabase();
            ContentValues contentValues = new ContentValues();
            contentValues.put("name", name);
            contentValues.put("gender", gender);
            contentValues.put("phone", phone);
            contentValues.put("email", email);
            contentValues.put("date", date);

            db.insert("Request", null, contentValues);
            //you can get the last added id by doing this. or you get -1 when the operation fails
            //long id = db.insert(PERSON_TABLE_NAME, null, contentValues);
            return true;
        }

        public Cursor get_request_details() {
            SQLiteDatabase db = this.getReadableDatabase();
            Cursor studentResults =  db.rawQuery( "SELECT * FROM " + "Request",null);
            return studentResults;
        }

        public Cursor getStudent(int id) {
            SQLiteDatabase db = this.getReadableDatabase();
            Cursor res =  db.rawQuery("SELECT * FROM " + "Request" + " WHERE " +
                    "_id"+ "=?", new String[]{Integer.toString(id)});
            return res;
        }

        public Integer deleteStudent(Integer id) {
            SQLiteDatabase db = this.getWritableDatabase();
            return db.delete("Request","_id" + " = ? ", new String[] { Integer.toString(id) });
        }
    }
