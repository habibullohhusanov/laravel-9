<?php

namespace App\Http\Controllers;

use App\Events\PostCreate;
use App\Http\Requests\StorePhotoRequest;
use App\Jobs\ChangeImage;
use App\Jobs\UploadBigFile;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->authorizeResource(Post::class);
    }
    public function index()
    {
        $posts = Post::paginate(10);
        return view("post.posts", [
            "posts"=> $posts,
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
            "image"=> $image,
        ]);
        PostCreate::dispatch($post);
        ChangeImage::dispatch($post);
        return redirect('post');
    }
    public function delete(Post $post, $id)
    {
        // $this->authorize('delete', $id);
        Gate::authorize('delete', $post);
        $b = Post::where('id', $id)->first();
        $b = 'posts/'.$b->image;
        Storage::delete($b);
        $post::where('id', $id)->delete();
        return redirect()->back();
    }
}
