<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Traits\ImageTrait;
use Nette\Utils\Validators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

// define('PAGINATION-Count',15);
class AdminController extends Controller
{
    use ImageTrait;


//////////////////////////////////////////////////////////////////
    // posts
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('dashboard.posts.createPost', ['categories' => $categories]);
    }

////////////////////////////////////////////////////////////////

    public function storePost(StorePostRequest $request)
    {

        $fileName = $this->saveImage($request->image, 'images/posts');
        // dd($fileName);

        Post::create([
            'image' => $fileName,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'tags' => $request->tags,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/')->with(['message' => 'تم اضافة مقال بنجاح']);
    }


    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.posts.editPost', ['post' => $post, 'categories' => $categories]);
    }

/////////////////////////////////////////////////////////////////

    public function updatePost(Request $request)
    {

        Validator::make($request->all(), [
            'title' => 'required|unique:posts,title|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'content' => 'required|string',
            'status' => 'required|in:active,pending',
            'tags' => 'required|string',
            'category_id' => 'required|numeric',
        ]);


        if ($request->has('image')) {
            $fileName = $this->saveImage($request->image, 'images/posts');
        } else {
            $fileName = Post::select('image')->find($request->id);
        }

        // dd($fileName);
        $post = Post::findOrFail($request->id);

        $post->update([
            'image' => $fileName,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'tags' => $request->tags,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('all-posts')->with(['message' => 'تم تعديل المقال بنجاح']);
    }


//////////////////////////////////////////////////////

    public function showPosts()
    {
        $posts = Post::with('user')->paginate(15);
        // dd($posts);
        return view('dashboard.posts.listPosts', ['posts' => $posts]);
    }

//////////////////////////////////////////////////////


    public function showPost($id)
    {
        $post = Post::with('comments','user')->where('id', $id)->get();
        $postDetails=json_decode($post);

        $categories = Category::all();

        // dd($postDetails);
        return view('dashboard.posts.showPost', compact('postDetails','categories'));
    }

/////////////////////////////////////////////////////

    public function deletePost($id)
    {

        $post = Post::findOrFail($id);
        $delete=$post->where('id',$id)->delete();
        Comment::where('post_id',$post->id)->delete();
        // dd($delete);
        // $post->with('comments')->delete();
        return redirect('all-posts')->with(['message' => 'تم تعديل المقال بنجاح']);
    }
}
