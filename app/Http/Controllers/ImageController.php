<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Image;
use  App\Album;

class ImageController extends Controller
{
   public  function index(){
      $images=Image::get();
      return  view('home',compact('images'));
   }

   public function store(Request  $req){

      $album=Album::create([
         'name'=>$req->get('album'),
      ]);
    
      if($req->hasFile('image')){
         foreach($req->file('image') as $image){
         $path=$image->store('uploads','public');   
         Image::create([
            'name'=>$path,
            'album_id'=>$album->id
         ]);
      }
      }

         return "<div class='alert alert-sucess'>Album created Sucessfully</div>";
   }
 
}
