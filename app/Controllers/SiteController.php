<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SiteController extends BaseController
{
    public function index()
    {
        return view('dashboard/dashboard');
        // $data = [
        //     "name" => "Sanjay",
        //     "email" => "onlinewebtutorhub@gmail.com",
        //     "designation" => "Web Developer"
        // ];

        // return view('home', $data);
    }

    public function aboutUs()
    {
        // Method #1
        $name = "Sanjay";
        $email = "onlinewebtutorhub@gmail.com";
        $designation = "Web Developer";

        return view('about-us', compact("name", "email", "designation"));
    }
}
