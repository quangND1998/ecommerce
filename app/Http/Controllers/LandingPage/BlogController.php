<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\BlogPage\Entities\Post;
class BlogController extends Controller
{
    //
    public function index(){
        $posts = Post::paginate(10);
        return view('landingpage.blog',compact('posts'));
    }
    public function blog_detail($title){
        $post = Post::with('tags')->where('slug',$title)->first();
        $post_others = Post::where('slug','!=', $title)->get()->take(4);
        return view('landingpage.itemBlog',compact('post','post_others'));
    }
}
