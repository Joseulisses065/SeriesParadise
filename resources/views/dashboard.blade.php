<x-app-layout>


<section class=" container py-12">
            <div class="bg-opc d-flex justify-content-center text-danger rounded p-1 mb-3">
                <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">ALL MIDIAS</h2>

            </div>

            <div class="container">
                <div class="d-flex justify-content-start gap-3 flex-wrap mb-5">
                <div class="card text-bg-dark" style="max-width: 12rem;min-width: 180px;">
                        <img src="" class="card-img" alt="">
                        <div class="card-img-overlay d-flex align-items-end p-0 card-bg w-100 h-100">
                            <div class="d-flex justify-content-center align-items-center h-100 w-100">
                               
                                <div class="d-flex">
                                 
                                    <a href="{{route('midias.create')}}">
                                        <div class="btn btn-transparent">
                                            <i class="bi bi-plus-circle-fill fs-2 text-danger pe"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @isset($midias)
                    @if($midias)
                    @foreach($midias as $midia)
                    <div class="card text-bg-dark" style="max-width: 12rem;min-width: 100px;">
                        <img src="{{asset(''.$midia->img.'')}}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-end p-0 card-bg w-100 h-100">
                            <div class="d-flex justify-content-between flex-column p-3 w-100">
                                <div>
                                    <h5 class="card-title fs-4 mb-0 f-russo">{{$midia->title}}</h5>
                                    <p>{{$midia->categori}}</p>
                                </div>
                                <div class="d-flex">
                                    <form action="{{Route('midias.edit',$midia->id)}}" method="GET">
                                        @csrf
                                        <button class="btn btn-transparent"><i
                                                class="bi bi-pencil-square fs-3 text-light pe"></i></button>
                                    </form>
                                    <form action="{{Route('midias.destroy',$midia->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-transparent"><i
                                                class="bi bi-trash fs-3 text-danger pe"></i></button>
                                    </form>
                                    <a href="{{route('seasons.show',$midia->id)}}">
                                        <div class="btn btn-transparent">
                                            <i class="bi bi-play-circle-fill fs-3 text-light pe"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @else
                    <p class="text-danger">Não há titulos nessa categoria</p>
                    @endif

                    @endisset

                </div>


        </section>

</x-app-layout>
