<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        return view("backend.post.list", compact("posts"));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view("backend.post.create", compact("categories"));
    }

    public function store(PostRequest $request)
    {
//        $request->validate([
//            "title" => "required | max:20 | min:6",
//            "content" => "required",
//            "user_id" => "required | numeric",
//        ]);
        $data = $request->only("title","content","user_id");
        $post = Post::create($data);
        $post->categories()->attach($request->category);
        return redirect()->route("posts.index");
    }

    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        $categories = $this->categoryRepository->getAll();
        return view("backend.post.update", compact("post","categories"));
    }

    public function update(Request $request,$id)
    {
        $data = $request->only("title","content","user_id");
        $post = Post::findOrFail($id);
        $post->update($data);
        $post->categories()->sync($request->category);
        return redirect()->route("posts.index");
    }
}
