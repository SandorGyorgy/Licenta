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
       $post = Post::with('location')->with('user')->get();

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
               $destinationPath = public_path().'/images';
               $gallery[$i]->move($destinationPath , $imageName);
               $column = 'image'.$i;
               $images->{$column} = $destinationPath."/".$imageName;
            }

           $images->save();
           
            $post = new Post;
            $post->title = $request->title ;
            $post->description = $request->description ;
            $post->room_nr = $request->room_nr;
            $post->price_month = $request->price_month ;
            $post->price_half_year = $request->price_half_year ;
            $post->price_year = $request->price_year ;

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
