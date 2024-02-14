<x-layout title="Home">

    <section class="min-vh-100 pt-2">
        <section class="container " id="banner">
            @isset($episode)
            <video class="object-fit-cover container"  controls poster='https://www.crunchyroll.com/imgsrv/display/thumbnail/1200x675/catalog/crunchyroll/4305090653ee4239dd0d797f1a4a6bdf.jpe'>
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