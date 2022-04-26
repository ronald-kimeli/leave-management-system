<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() 
     {
        return view('Pages.index');
    }
    public function about()
    {
      $title = "About us page from controller";
      $body = "This is my about us page";
      $footer = "The copyright for the end year";
      return view('Pages.about',compact('title','body','footer'));
    //  return $title; 
    }

    public function users($id,$com) 
    {
        $name = "RONALD KIMELI -" .$id."Company name-".$com;
        $reg = "CHRISTIAN";
        return view('Pages.users', compact('name','reg'));
   }
}
