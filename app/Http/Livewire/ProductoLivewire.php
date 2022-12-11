<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ProductoLivewire extends Component{

    public function render(){
        $posts=Post::where('user_id','1')->get();
        return view('livewire.producto-livewire',compact('posts'));
    }
}
