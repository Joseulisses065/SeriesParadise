<x-layout title="Home">
    @isset($msg)
    <div class="alert alert-success position-fixed" style="right: 5px; top:5px">
        {{$msg}}
    </div>
    @endisset
    <section class="min-vh-100 pt-2">
        <section class="container " id="banner">
            @isset($midias)
            @if(count($midias)>0)
            @for($i=0;$i<1;$i++) <a href="{{route('seasons.index',$midias[$i]->id)}}"> <img class="img-fluid shadow-lg w-100  rounded"
                    src="{{asset(''.$midias[$i]->banner.'')}}" alt="">
                </a>

                @endfor;
                @else
                <p class="text-light">não ha baner</p>
                @endif
                @endisset

        </section>

        <section class="pt-2 container ">
            <div class="bg-opc d-flex justify-content-between text-danger rounded p-1 mb-3">
                <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">Popular Series</h2>
                <div class="">
                    <a class="return" href=""><i class="bi bi-caret-left-fill text-danger fs-4"></i></a>
                    <a class="next" href=""><i class="bi bi-caret-right-fill text-danger fs-4"></i></a>
                </div>
            </div>

            <div id="card-slide-custom"
                class="card-slide  container  d-flex justify-content-start overflow-x-scroll gap-3">
                @isset($series)
                @if($series)
                @foreach($series as $serie)
                <div class="card text-bg-dark" style="max-width: 15rem;min-width: 200px;">
                    <img src="{{asset(''.$serie->img.'')}}" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex align-items-end p-0 card-bg w-100 h-100">
                        <div class="d-flex justify-content-between p-3 w-100">
                            <div>
                                <h5 class="card-title fs-4 mb-0 f-russo">{{$serie->title}}</h5>
                                <p>{{$serie->categori}}</p>
                            </div>
                            <a href="{{Route('seasons.index',$serie->id)}}"> <i class="bi bi-play-circle-fill fs-1 text-danger pe"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach
                @else
                <p class="text-light">Não há titulos nessa categoria</p>
                @endif

                @endisset

            </div>


        </section>



        <section class="pt-5 container">
            <div class="bg-opc d-flex justify-content-between text-danger rounded p-1 mb-3">
                <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">Popular anime</h2>

            </div>

            <div class="container">
                <div class="d-flex justify-content-start gap-3 flex-wrap mb-5">
                    @isset($animes)
                    @if($animes)
                    @foreach($animes as $anime)
                    <div class="card text-bg-dark" style="max-width: 12rem;min-width: 100px;">
                        <img src="{{asset(''.$anime->img.'')}}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end p-0 card-bg w-100 h-100">
                            <div class="d-flex justify-content-between p-3 w-100">
                                <div>
                                    <h5 class="card-title fs-4 mb-0 f-russo">{{$anime->title}}</h5>
                                    <p>{{$anime->categori}}</p>
                                </div>
                                <a href="{{route('seasons.index',$anime->id)}}"> <i class="bi bi-play-circle-fill fs-1 text-danger pe"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                @else
                <p class="text-light">Não há titulos nessa categoria</p>
                @endif

                @endisset

            </div>


        </section>




    </section>
</x-layout>