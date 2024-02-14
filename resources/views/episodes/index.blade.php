<x-layout title="Home">

    <section class="min-vh-100 pt-2">
        <section class="container " id="banner">
            @isset($episode)
            <video class="object-fit-cover container" autoplay controls poster='https://www.crunchyroll.com/imgsrv/display/thumbnail/1200x675/catalog/crunchyroll/4305090653ee4239dd0d797f1a4a6bdf.jpe'>
                <source src="https://media.geeksforgeeks.org/wp-content/uploads/20200409094356/Placement100-_-GeeksforGeeks2.mp4?_=1" type="video/mp4">
            </video>
            @endisset

            <header class="text-light px-2">
            <h1 class="f-russo text-danger">titulo</h1>
            <p>lançado em 6 jan 2024</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil amet cumque omnis animi dignissimos culpa hic sed odio esse cupiditate repudiandae, natus id. Eveniet suscipit sit laboriosam esse, impedit fugit.</p>
            </header>



        </section>

        <section class="container mb-5 p-3 text-light">

        <h2 class="f-russo text-danger">Coments</h2>

        </section>
    </section>
</x-layout>