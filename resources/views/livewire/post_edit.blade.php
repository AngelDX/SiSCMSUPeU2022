<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            {!! Form::model($post,['route'=>['post-update',$post->id],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
            {!! Form::hidden('user_id',auth()->user()->id) !!}
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <x-jet-label value="Nombre noticia" class="font-bold"/>
                    {!! Form::text('name',null,['class'=>'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm','placeholder'=>'Ingrese el nombre del post']) !!}
                    <x-jet-input-error for="name"/>
                </div>
            </div>
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <x-jet-label value="Slug noticia" class="font-bold"/>
                    {!! Form::text('slug',null,['class'=>'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm','placeholder'=>'Ingrese el slug del post']) !!}
                    <x-jet-input-error for="slug"/>
                </div>
            </div>
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <x-jet-label value="Categoria" class="font-bold"/>
                    {!! Form::select('category_id',$categories,null,['class'=>'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}
                    <x-jet-input-error for="category_id"/>
                </div>
            </div>
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <x-jet-label value="Tags" class="font-bold"/>
                    @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! Form::checkbox('tags[]',$tag->id,null) !!}
                        {{$tag->name}}
                    </label>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-start mx-2 mb-6">
                <p class="mr-4">Estado</p>
                <label class="mr-2">
                    {!! Form::radio('status',1,true) !!}
                    Borrador
                </label>
                <label>
                    {!! Form::radio('status',2,false) !!}
                    Publicado
                </label>
                <x-jet-input-error for="status"/>
            </div>
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <div class="image-wrapper">
                        @if($post->image)
                            <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
                        @else
                            <img id="picture" src="/storage/posts/default.webp" alt="">
                        @endif
                    </div>
                </div>
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <div class="form-group">
                        {!! Form::label('file','Imagen del post',['class'=>'form-label']) !!}
                        {!! Form::file('file', ['class'=>'form-control','accept'=>'image/*']) !!}
                    </div>
                </div>
                @error('file')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <x-jet-label value="Extract" class="font-bold"/>
                    {!! Form::textarea('extract',null,['class'=>'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}
                    <x-jet-input-error for="extract"/>
                </div>
            </div>
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                    <x-jet-label value="Cuerpo de la noticia" class="font-bold"/>
                    {!! Form::textarea('body',null,['class'=>'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}
                    <x-jet-input-error for="body"/>
                </div>
            </div>
            {!! Form::submit('Actualizar post',['class'=>'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) !!}
            </div>
        </div>
    </div>
    <script>
        //Cambiar imagen
        document.getElementById("file").addEventListener('change',cambiarImagen);
        function cambiarImagen(event){
            var file=event.target.files[0];
            var reader=new FileReader();
            reader.onload=(event)=>{
                document.getElementById("picture").setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>
