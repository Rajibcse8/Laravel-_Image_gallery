<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Image;
use  App\Album;

class ImageController extends Controller
{

  public  function album(){
     $albums=Album::with('images')->get();
     return view('welcome',compact('albums'));
  }

  public function show($id){
      $albums=Album::findOrFail($id);
      return view('gallery',compact('albums'));
  }

   public  function index(){
      $images=Image::get();
      return  view('home',compact('images'));
   }

   public function store(Request  $req){

      $this->validate($req,[
         'album'=>'required|min:3|max:30',
         'image'=>'required'
      ]);

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

         return "<div class='alert alert-success'>Album created Sucessfully</div>";
   }

   public function destroy(Request $req){
      $image=Image::findOrFail(($req->id));
      $image->delete();
      return  redirect()->back()->with('messege','Image delete sucessfully');
   }
 
}
