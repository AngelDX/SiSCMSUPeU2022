<?php

namespace App\Http\Livewire;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CrudPost extends Component{

    public $isOpen=false;
    public $search,$post;
    protected $listeners=['render','delete'=>'delete'];

    public function render(){
        $posts=Post::where('name','like','%'.$this->search.'%')->paginate();
        return view('livewire.crud-post',compact('posts'));
    }

    public function create(){
        $categories=Category::pluck('name','id');
        $tags=Tag::all();
        return view('livewire.post_create',compact('categories','tags'));
    }

    public function store(PostRequest $request){
        $post=Post::create($request->all());
        if($request->file('file')){
            $url=Storage::put('public/posts',$request->file('file'));
            $post->image()->create([
                'url'=>$url
            ]);
        };
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('posts');
    }

    public function edit($id){
        //dd($id);
        $post=Post::find($id);
        $categories=Category::pluck('name','id');
        $tags=Tag::all();
        return view('livewire.post_edit',compact('categories','tags','post'));
    }

    public function update(PostRequest $request,$id){
        //dd($id);
        $post=post::find($id);
        $post->update($request->all());
        if($request->file('file')){
            $url=Storage::put('public/posts',$request->file('file'));
            if($post->image){
                Storage::delete($post->image->url);
                $post->image()->update([
                    'url'=>$url
                ]);
            }else{
                $post->image()->create([
                    'url'=>$url
                ]);
            }
        };
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('posts');
    }

    public function delete($id){
        $post=Post::find($id);
        $post->update([
            'status'=>"1"
        ]);
        //$post->delete();
        return redirect()->route('posts');
    }

}
