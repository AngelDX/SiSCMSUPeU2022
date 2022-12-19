<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class CrudCategory extends Component{

    public $isOpen=false;
    public $search,$category;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'category.name'=>'required',
        'category.slug'=>'required',
    ];

    public function render(){
        $categories=Category::where('name','like','%'.$this->search.'%')->paginate();
        return view('livewire.crud-category',compact('categories'));
    }

    public function create(){
        $this->isOpen=true;
        $this->reset('category');
    }

    public function store(){
        $this->validate();

        if(!isset($this->category['id'])){
            Category::create($this->category);
        }else{
            /*
            $category=Category::find($this->category['id']);
            $category->name=$this->category['name'];
            $category->slug=$this->category['slug'];
            $category->save();
            */
            Category::whereId($this->category['id'])->update($this->category);
        }
        $this->reset(['isOpen','category']);
        $this->emitTo('CrudCategory','render');
        $this->emit('alert','Registro creado satisfactoriamente');
    }

    public function edit($category){
        $this->category=array_slice($category,0,3);
        $this->isOpen=true;
    }

    public function updatedCategoryName(){
        $this->category['slug']=Str::slug($this->category['name']);
    }

    public function delete($id){
        Category::find($id)->delete();
    }


    // Generate PDF
    public function createPDF() {
        $data = Category::all();
        $pdf = FacadePdf::loadView('reporte/pdf_view',compact('data'));
        //return $pdf->download('pdf_file.pdf');    //desacarga automaticamente
        return $pdf->stream('reporte/pdf_view',compact('data')); //abre en una pestaña como pdf
    }

}
