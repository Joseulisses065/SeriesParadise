<x-layout title="Home">

    <section class="min-vh-100 pt-2">
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
            @isset($episode)
            <video class="object-fit-cover container" controls
                poster='https://www.crunchyroll.com/imgsrv/display/thumbnail/1200x675/catalog/crunchyroll/4305090653ee4239dd0d797f1a4a6bdf.jpe'>
                <source src="{{$episode->episode_link}}" type="video/mp4">
            </video>

            <header class="text-light px-2">
                <h1 class="f-russo text-danger">{{$episode->title}}</h1>
                <p></p>
                <p>{{$episode->description}}</p>
            </header>


            @endisset

        </section>

        <section class="container mb-5 p-3 text-light">

            <h2 class="f-russo text-danger">Coments</h2>

        </section>
    </section>
</x-layout>