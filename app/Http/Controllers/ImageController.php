<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Image;

class ImageController extends Controller
{
   public  function index(){
      $images=Image::get();
      return  view('home',compact('images'));
   }

   public function store(Request  $req){
    
      if($req->hasFile('image')){
         Image::create([
            'name'=>$req->file('image')->store('uploads','public'),
            'album_id'=>1
         ]);
      }
   }
 
}
