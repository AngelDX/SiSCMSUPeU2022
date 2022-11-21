<x-app-layout>
<div class="mt-4 max-w rounded overflow-hidden shadow-lg container m-auto">
        <div class="card-header mb-2">
            <a href="{{route('crud-categories.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Agregar categoria</a>
        </div>
        @if(session('info'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">{{session('info')}}</strong>
            </div>
        @endif
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg w-full">
            <table class="w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-indigo-500 text-white">
                    <tr class="text-left text-xs font-bold  uppercase">
                    <td scope="col" class="px-6 py-3">ID</td>
                    <td scope="col" class="px-6 py-3">Categoría</td>
                    <td scope="col" class="px-6 py-3">Slug</td>
                    <td scope="col" class="px-6 py-3">Creado</td>
                    <td scope="col" class="px-6 py-3">Actualizado</td>
                    <td scope="col" class="px-6 py-3" colspan="3">Opciones</td>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($categories as $category)
                        <tr class="text-sm font-medium text-gray-900">
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                                {{$category->id}}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{$category->name}}</td>
                            <td class="px-6 py-4">{{$category->slug}}</td>
                            <td class="px-6 py-4">{{$category->created_at}}</td>
                            <td class="px-6 py-4">{{$category->updated_at}}</td>
                            <td width="10px">
                                <a href="{{route('crud-categories.edit',$category)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    <i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('crud-categories.destroy',$category)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
</x-app-layout>