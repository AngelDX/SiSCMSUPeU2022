<x-app-layout>
    <div class="container ml-auto mr-auto py-3 px-3">
        <main class="flex">
            <section class="pb-20 mr-6 w-2/3">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 mt-4">{{ $post->name }}</h1>
                <div class="text-lg mb-2">
                    {{$post->extract}}
                </div>
                <div class="gap-6">
                    {{-- Contenido principal --}}
                    <div class="lg:col-span-2">
                        <figure>
                            <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}">
                        </figure>
                        <div class="text-base text-gray-800 mt-4 text-justify">
                            {{$post->body}}
                        </div>
                    </div>
                </div>
            </section>
             {{-- Contenido relacionado --}}
             <aside class="w-1/3">
                <h1 class="text-2xl font-bold text-gray-100 mb-2">Más en {{$post->category->name}}</h1>
                <ul>
                    @foreach ($similares as $item)
                        <div class="mb-3">
                            <a class="grid grid-cols-3" href="{{route('posts.show',$item)}}">
                                <div class="w-60 object-cover object-center">
                                    <img class="" src="{{Storage::url($item->image->url)}}">
                                </div>
                                <div>
                                    <p class="">{{$item->name}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </ul>
            </aside>
          </main>
    </div>
</x-app-layout>
