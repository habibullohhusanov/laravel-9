<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Events\PostCreate;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        // faqat ulangan controller uchun $this->authorizeResource(Post::class, 'post');
    }
    public function index()
    {
        $posts = Post::paginate(10);
        return view("post.posts", [
            "posts" => $posts,
        ]);
    }
    public function add_view()
    {
        return view("post.add");
    }
    public function add(StorePhotoRequest $request)
    {
        $image = time() . '.' . $request->image->getClientOriginalExtension();
        $request->file('image')->storeAs('posts', $image);
        $post = Post::create([
            "user_id" => Auth::user()->id,
            "image" => $image,
        ]);
        PostCreate::dispatch($post);
        return redirect('post');
    }
    public function delete(Post $post, $id)
    {
        // $this->authorize('delete', Post::where('id', $id)->first());
        Gate::authorize('delete', Post::where('id', $id)->first());
        $b = Post::where('id', $id)->first();
        $b = 'posts/' . $b->image;
        Storage::delete($b);
        $post::where('id', $id)->delete();
        return redirect()->back();
    }
}
