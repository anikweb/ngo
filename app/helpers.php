<?php
    function generalSettings(){
        return App\Models\generalSetting::first();
    }
    function contactInfo(){
        return App\Models\ContactAndBasicInfo::latest()->get();
    }

    function projects(){
        return App\Models\Project::get();
    }





?>
