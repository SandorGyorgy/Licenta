<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Location;
use App\Images;
use Illuminate\Http\Request;
use JWTFactory;
use JWTAuth;
use Response;

class PostController extends Controller
{   
    public function index(){
       $post = Post::with(['location' , 'images'])->with('user')->get();
            return response()->json($post);

    }
    
    public function userPosts()
    {   
        $user = auth()->user();
        $user->only('id','name', 'email');
        $posts = $user->post()->with(['location' , 'images'])->get();
        return response()->json(['user' => $user , 'post' => $posts]);
    }

   
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
            $user_id = $request->id;
            $user = User::findOrFail($user_id);

            $location = new Location;
            $location->address = $request->address;
            $location->lat = $request->lat;
            $location->lng = $request->lng;

      
            $images = new Images;
            $gallery = $request->file('images');
            for($i = 0 ; $i < sizeof($gallery) ; $i++){
               $extention = $gallery[$i]->getClientOriginalExtension();
               $imageName = time().str_random().".".$extention;
               $destinationPath = public_path('images');
               $gallery[$i]->move($destinationPath , $imageName);
               $column = 'image'.$i;
               $images->{$column} = "http://licenta.test/images/".$imageName;
            }

            $images->save();
           
            $post = new Post;
            $post->title = $request->title ;
            $post->description = $request->description ;
            $post->room_nr = $request->room_nr;
            $post->price_month = $request->price_month ;
            $post->price_half_year = $request->price_half_year ;
            $post->price_year = $request->price_year ;
            $post->dimension = $request->dimension ;

            $location->save();
            $post->save();

            $post->user_id = $user_id;
            $post->location_id = $location->id;
            $images->post_id = $post->id;
            $location->post_id = $post->id;

            $location->update();
            $post->update();
            $images->update();

       
                
    }

    
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $location = Location::where('post_id' , $id)->firstOrFail()->only('lat','lng','address');
        $images = Images::where('post_id' , $id)->firstOrFail();
        $user = User::where('id' , $post->user_id)->firstOrFail()->only('email' , 'name' ,'phone' ,'profile_picture');
    
        return response()->json([
            'post' => $post , 
            'location' => $location , 
            'images' => $images,
            'user' => $user,
        ]);
    }


    public function edit(Request $request)
    {   $id = $request->id;
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->room_nr = $request->room_nr;
        $post->price_month = $request->price_month ;
        $post->price_half_year = $request->price_half_year ;
        $post->price_year = $request->price_year ;
        $post->dimension = $request->dimension;

      

        $location = Location::where('post_id' , $id)->firstOrFail();

        $location->address = $request->address;
        $location->lat = $request->lat;
        $location->lng = $request->lng;


        $images = Images::where('post_id' , $id)->firstOrFail();

        $oldImages = json_decode($request->oldImages ,true);
        $newImages = $request->newImages;
       
        $currentFileNumber = sizeof($newImages);
        $i = -1;
        foreach( $oldImages as $key => $value ){
            
            if( $value != $images->{$key} ){
                    $public = public_path('images');
                    $oldImagePath = $images->{$key};
                    $oldImageName = explode("http://licenta.test/images/" , $oldImagePath );
                    $path = $public.'/'.$oldImageName[1];
                    \File::delete($path);
                    $images->{$key} = null;
            }

            if($images->{$key} == null && $currentFileNumber > 0){
                $i = $i + 1 ;
                $currentFileNumber = $currentFileNumber -1;
                $extention = $newImages[$i]->getClientOriginalExtension();
                $imageName = time().str_random().".".$extention;
                $destinationPath = public_path('images');
                $newImages[$i]->move($destinationPath , $imageName);
                $images->{$key} = "http://licenta.test/images/".$imageName; 
            }

         }

       

         $images->update();
         $post->update();

        //  $oldImagePath = $images->image0;
        // $oldImageName = explode("http://licenta.test/images/" , $oldImagePath );

        //  return $oldImageName;

    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $userId = $request->userId;
        $post = Post::findOrFail($id);
       
      
        if($userId == $post->user_id && $post){
            $location = Location::where('post_id' , $id)->firstOrFail();
            $images = Images::where('post_id' , $id)->firstOrFail();
         for($i = 0 ; $i<5 ; $i++){
            $iteration = 'image'.$i;
            $image = $images->$iteration;
            if($image){
                $name = explode('http://licenta.test/images/' , $image);
                $path = public_path('images').'/'.$name[1];
                \File::delete($path);
               
            }
         }
         $images->delete();
         $location->delete();
         $post->delete();
         return response()->json('Postare strearsa cu succes' , 200);
        }else{
            return response()->json('Error');
        }
            

    }
}
