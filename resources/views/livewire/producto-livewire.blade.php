<div class="my-6">
    <h2 class="text-2xl font-bold text-center">Productos destacados</h2>
    <div class="flex items-center">
        <div onclick="prev()" class="w-1/12 text-right">
            <button class="bg-white pl-2 w-10 h-10 rounded-full shadow hover:bg-violet-300">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div id="sliderContainer" class="w-full overflow-hidden border">
            <ul id="slider" class="flex transition-margin duration-1000">
                @foreach ($posts as $post)
                <li class="w-96">
                    <div class="rounded overflow-hidden shadow-lg m-2 h-[450px]">
                        <img class="w-full" src="{{Storage::url($post->image->url)}}">
                        <div class="px-6 py-4 h-56">
                          <div class="font-bold text-xl mb-2">{{$post->name}}</div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="w-1/12 text-left">
            <button onclick="next()" class="bg-white pl-2 w-10 h-10 rounded-full shadow hover:bg-violet-300">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    <script>
        let sliderContainer=document.getElementById('sliderContainer');
        let slider=document.getElementById('slider');
        let cards=slider.getElementsByTagName('li');

        let elementsToShow=4;
        let sliderContainerWidth=sliderContainer.clientWidth;
        let cardWidth=sliderContainerWidth/elementsToShow;

        slider.style.width=cards.length*cardWidth+'px';

        for (let index = 0; index < cards.length; index++) {
            const element=cards[index];
            element.style.width=cardWidth+'px';
        }

        function prev(){
            //console.log(+slider.style.marginLeft.slice(0,-2))
            if(+slider.style.marginLeft.slice(0,-2) != -cardWidth*(cards.length-elementsToShow))
                slider.style.marginLeft=((+slider.style.marginLeft.slice(0,-2))-cardWidth)+'px';
        }

        function next(){
            //console.log(+slider.style.marginLeft.slice(0,-2))
            if(+slider.style.marginLeft.slice(0,-2) != 0)
                slider.style.marginLeft=((+slider.style.marginLeft.slice(0,-2))+cardWidth)+'px';
        }
        //console.log(cardWidth);
    </script>
</div>

