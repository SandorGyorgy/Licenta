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
            // $user_id = $request->id;
            // $user = User::findOrFail($user_id);

            // $location = new Location;
            // $location->address = $request->address;
            // $location->lat = $request->lat;
            // $location->lng = $request->lng;




            $images = new Images;
          
                $gallery = [];
                $gallery = $request->images;

               
                $image = $request->images[0];
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $imageName = 'test242.jpg';
                $destinationPath = public_path().'/images' . $imageName;
                $file = base64_decode($image);
                $file->move($destinationPath , $imageName );
               //\File::put(public_path().'/images'. '/' . $imageName, base64_decode($image));
                



            // for($i = 0 ; $i < sizeof($gallery) ; $i++){
               
            //    $fileName = "product-".time().".png";
            //    base64_decode($gallery[$i])->move(public_path().'/images'. $fileName, $fileName);
            //    $destinationPath = public_path().'/images' . $fileName;
            //     $column = 'image'.$i;
            //     $images->{$column} = $gallery[$i];
            // }

            $images->save();
           
            // $post = new Post;
            // $post->title = $request->title ;
            // $post->description = $request->description ;
            // $post->room_nr = $request->room_nr;
            // $post->price_month = $request->price_month ;
            // $post->price_half_year = $request->price_half_year ;
            // $post->price_year = $request->price_year ;

            // $location->save();
            // $post->save();

            // $post->user_id = $user_id;
            // $post->location_id = $location->id;
            // $images->post_id = $post->id;
            // $location->post_id = $post->id;

            // $location->update();
            // $post->update();

        
        
            

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
