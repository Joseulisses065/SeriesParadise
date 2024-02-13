<x-layout title="Home">

    <section class="min-vh-100 p-2">
        <section class="container " id="banner">
            <img class="img-fluid shadow-lg w-100 rounded" src="{{asset($midia->banner)}}" alt="">


        </section>
        <section class="container mt-3 mb-5 text-light">
            <div>
                <h2 class="f-russo text-danger">{{$midia->title}}</h2>
                <p class="fs-5">{{$midia->description}}</p>
            </div>
            <select class="form-select w-25 bg-dark text-light" aria-label="Default select example">
                @foreach($seasons as $season)
                <option value="1">{{$season->number}}</option>
                @endforeach

            </select>
            <div class="d-flex justify-content-start gap-3 flex-wrap mt-3">

                @foreach($seasons as $season)
                @for($i=0;$i<$season->episodes->count();$i++)
                    <div class="card text-bg-dark" style="max-width: 10rem; min-width: 200px;">
                        <img src="{{asset($season->episodes[$i]->banner)}}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end p-0 card-bg w-100 h-100">
                            <div class="d-flex flex-column justify-content-between p-1 w-100">
                                @if($season->episodes[$i]->watched==false)
                                <form class="d-flex justify-content-center"
                                    action="{{route('episodes.update',$season->episodes[$i])}}">@csrf <button
                                        class="btn btn-transparent"><i
                                            class="bi bi-play-circle-fill fs-1 text-danger pe"></i></button>
                                </form>
                                @else
                                <div class="d-flex justify-content-center">
                                    <a class="btn "
                                        href="{{route('episodes.index',$season->episodes[$i])}}"><i class="bi bi-check-circle-fill text-success fs-1"></i></a>

                                </div>
                                @endif
                                <div>
                                    <p class="fw-bold m-0">{{$season->number.':E'.$season->episodes[$i]->number+1}}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endfor
                    @endforeach



            </div>
        </section>


</x-layout>