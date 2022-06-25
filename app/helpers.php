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
    function imageGallery(){
        return App\Models\ImageGallery::get();
    }
    function events(){
        return App\Models\Events::latest()->limit(5)->get();
    }
?>
