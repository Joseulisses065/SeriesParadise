<x-app-layout>

    <section class="min-vh-100 p-2">
        @isset($msg)

        <div class="alert alert-success  w-50 position-fixed" style="right: 5px; top:5px">
            <div class="d-flex justify-content-between position-relative">
                <ul class="m-0 list-unstyled">
                    <li> {{ $msg }}
                    </li>
                </ul>
                <a href="">
                    <i class="bi bi-x-circle-fill text-dark fs-4"></i></a>
            </div>
        </div>


        @endisset
        <section class="container " id="banner">
            <img class="img-fluid shadow-lg w-100 rounded" src="{{asset($midia->banner)}}" alt="">


        </section>
        <section class="container mt-3 mb-5 text-light">
            <div>
                <h2 class="f-russo text-danger">{{$midia->title}}</h2>
                <p class="fs-5">{{$midia->description}}</p>
            </div>


            @foreach($seasons as $season)
            <div class="mb-3">
                <div class="bg-opc d-flex justify-content-between text-danger rounded p-1 mb-3">
                    <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">SEASON - {{$season->number}}</h2>
                    <div class="d-flex justify-between">
                        <form action="{{Route('seasons.edit',$season->id)}}" method="get">
                            @csrf
                            <button class="btn btn-transparent"><i
                                    class="bi bi-pencil-square  text-light pe"></i></button>
                        </form>
                        <form action="{{Route('seasons.destroy',$season->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-transparent"><i class="bi bi-trash  text-danger pe"></i></button>
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-start gap-3 flex-wrap my-3">

                    @for($i=0;$i<$season->episodes->count();$i++)
                        <div class="card text-bg-dark" style="max-width: 10rem; min-width: 200px;">
                            <img src="{{asset($season->episodes[$i]->banner)}}" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-end p-0 card-bg w-100 h-100">
                                <div class="d-flex flex-column justify-content-between p-1 w-100">

                                    <div class="d-flex justify-content-center">
                                        <form action="{{Route('episodes.edit',$season->episodes[$i]->id)}}"
                                            method="get">
                                            @csrf
                                            <button class="btn btn-transparent"><i
                                                    class="bi bi-pencil-square  text-light fs-3 pe"></i></button>
                                        </form>
                                        <form action="{{Route('episodes.destroy',$season->episodes[$i]->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-transparent"><i
                                                    class="bi bi-trash  text-danger fs-3 pe"></i></button>
                                        </form>
                                        <form class="d-flex justify-content-center"
                                            action="{{Route('episodes.index',$season->episodes[$i]->id)}}">@csrf <button
                                                class="btn btn-transparent"><i
                                                    class="bi bi-play-circle-fill fs-3 text-light pe"></i></button>
                                        </form>
                                    </div>


                                    <div>
                                        <p class="fw-bold m-0">{{$season->number.':E'.$season->episodes[$i]->number+1}}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endfor

                        <div class="card text-bg-dark bg-dark"
                            style="max-width: 10rem; min-width: 200px; min-height: 120px;">
                            <img width="200" class="card-img">
                            <div class="card-img-overlay d-flex align-items-end p-0 card-bg w-100 h-100">
                                <div class="d-flex flex-column justify-content-between p-1 w-100">
                                    <a href="{{route('episodes.create',$season->id)}}"
                                        class="btn btn-transparent mb-3"><i
                                            class="bi bi-plus-circle-fill fs-1 text-danger pe"></i></button>
                                    </a>



                                </div>
                            </div>
                        </div>
                </div>

                @endforeach



            </div>
            <div class="mb-3">
                <div class="bg-opc d-flex justify-content-center text-danger rounded p-1 mb-3">
                    <a href="{{route('seasons.create',$midia->id)}}" class=""><i
                            class="bi bi-plus-circle-fill fs-2 text-danger pe"></i></button>
                    </a>
                </div>
        </section>


</x-app-layout>
