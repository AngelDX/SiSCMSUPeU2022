<?php
//CRUD ORIENTADO A OBJETOS
namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class TagCrud extends Component{

    public $isOpen=false;
    public $search;
    public Tag $tag;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'tag.name'=>'required',
        'tag.slug'=>'required',
    ];

    public function mount()    {
        $this->tag=new Tag();
    }

    public function render(){
        $tags=Tag::where('name','like','%'.$this->search.'%')->paginate();
        return view('livewire.tag-crud',compact('tags'));
    }

    public function create(){
        $this->isOpen=true;
        $this->tag=new Tag();
    }

    public function store(){
        $this->validate();
        $this->tag->save();

        $this->reset(['isOpen']);
        $this->tag=new Tag();
        $this->emitTo('TagCrud','render');
        $this->emit('alert','Registro creado satisfactoriamente');
    }

    public function edit(Tag $tag){
        $this->tag=$tag;
        $this->isOpen=true;
    }

    public function updatedtagName(){
        $this->tag['slug']=Str::slug($this->tag['name']);
    }

    public function delete(Tag $tag){
        $tag->delete();
    }

}
