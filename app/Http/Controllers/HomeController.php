<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    function index(Request $request) 
    {
        $posts = DB::table('posts')->orderBy('updated_at', 'desc')->get();
        return view('home', ['posts' => $posts]);
    }


    function addPost(Request $request) 
    {
        $id = DB::table('posts')->insertGetId([
            'author' => $request->author, 
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]
        );

        if($id) {
            return redirect('/');
        }

        echo "We had a problem creating the post...";
    }

    function deletePost(Request $request, $id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect('/');
    }

    function editPost(Request $request)
    {
        DB::table('posts')->where('id', $request->id)->update([
            'author' => $request->author,
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/');
    }
}
