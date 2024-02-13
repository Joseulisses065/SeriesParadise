<x-layout title="Home">

    <section class="min-vh-100 pt-2">
        <section class="container " id="banner">
            @isset($episode)
            <video width="320" height="240" controls poster='{{$episode->banner}}'>
                <source src="https://media.geeksforgeeks.org/wp-content/uploads/20200409094356/Placement100-_-GeeksforGeeks2.mp4?_=1" type="video/mp4">
            </video>
            @endisset

        </section>
    </section>
</x-layout>