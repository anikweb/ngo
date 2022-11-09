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
    function about(){
        return App\Models\about::find(1);
    }
    
    if (! function_exists('previous_route')) {
        /**
         * Generate a route name for the previous request.
         *
         * @return string|null
         */
        function previous_route()
        {
            $previousRequest = app('request')->create(app('url')->previous());

            try {
                $routeName = app('router')->getRoutes()->match($previousRequest)->getName();
            } catch (NotFoundHttpException $exception) {
                return null;
            }

            return $routeName;
        }
    }
?>
