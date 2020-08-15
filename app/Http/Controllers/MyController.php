<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DateTime;

class MyController extends Controller
{
   public function MyAction(Request $request)
    {
        Mail::to($user)->send(new WelcomeMail($user));
    }
}
