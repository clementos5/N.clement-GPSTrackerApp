package com.tebuka.project.year.afinal.tebukapp;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.LinearInterpolator;
import android.view.animation.RotateAnimation;
import android.widget.ImageView;

public class Home_Fragment extends Fragment {

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view=inflater.inflate(R.layout.fragment_home, container, false);

        ImageView image=(ImageView) view.findViewById(R.id.imageView2);


         // Step1 : create the  RotateAnimation object
        RotateAnimation anim = new RotateAnimation(30, 90,
                Animation.RELATIVE_TO_SELF, 0.5f, Animation.RELATIVE_TO_SELF, 0.5f);
        // Step 2:  Set the Animation properties
        anim.setInterpolator(new LinearInterpolator());
        anim.setRepeatCount(Animation.INFINITE);
        anim.setDuration(700);

        // Step 3: Start animating the image
        image.startAnimation(anim);

        // Later. if you want to  stop the animation
        // image.setAnimation(null);*/
        return  view;
    }

}
