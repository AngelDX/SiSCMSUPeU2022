<x-app-layout>
<div class="mt-4 max-w rounded overflow-hidden shadow-lg container m-auto">
  <div class="w-1/2 mx-auto">
    <h2 class="text-center text-xl">Editar categoria</h2>
    <div class="w-full m-4 border border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
      {!! Form::model($category,['route'=>['crud-categories.update',$category],'method'=>'put']) !!}
        <div class="mb-2 md:mr-2 md:mb-0 w-full">
          <x-jet-label value="Nombre categoría" class="font-bold"/>
          {!! Form::text('name',null,['class'=>'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm','placeholder'=>'Ingrese nombre la categoria']) !!}
          <x-jet-input-error for="name"/>
        </div>
        <div class="mb-2 md:mr-2 md:mb-0 w-full">
          <x-jet-label value="Slug categoría" class="font-bold"/>
          {!! Form::text('slug',null,['class'=>'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm','placeholder'=>'Ingrese slug de la categoria']) !!}
          <x-jet-input-error for="slug"/>
        </div>
          {!! Form::submit('Actualizar categoria', ['class'=>'mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) !!}
      {!! Form::close() !!}
    </div>
  </div>    
</div>
</x-app-layout>