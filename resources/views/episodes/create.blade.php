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
        <section class="pt-5 container">
            <div class="bg-opc d-flex justify-content-center text-danger rounded p-1 mb-3">
                <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">ADD EPISODES</h2>

            </div>
            <form action="{{route('midias.store')}}" method="post" data-bs-theme="dark" class="text-light fw-bold"
                enctype="multipart/form-data">
                @csrf
                <div class="d-flex gap-3">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" placeholder="Ex:Naruto" class="form-control" value="{{old('title')}}"
                            name="title" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="categori" class="form-label">Categori</label>
                        <input type="text" placeholder="Ex:Action" class="form-control" value="{{old('categori')}}"
                            name="categori" id="categori" aria-describedby="categori">
                    </div>
                    <div class="form-group mb-3">
                        <label for="type" class="form-label">Type</label>

                        <select class="form-select" name='type' id='type' aria-label="Default select example">
                            <option value="anime">Anime</option>
                            <option value="serie">Serie</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex gap-3">
                    <div class="mb-3">
                        <label for="img" class="form-label">Card</label>
                        <input class="form-control" type="file" name="img" id="img">
                    </div>
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner</label>
                        <input class="form-control" type="file" name="banner" id="banner">
                    </div>


                </div>


                <div class="d-flex gap-3">

                    <div class="form-group mb-3">
                        <label for="seasons" class="form-label">Seasons</label>
                        <input type="number" placeholder="Ex:2" class="form-control" value="{{old('seasons')}}"
                            name="seasons" id="seasons" aria-describedby="seasons">
                    </div>
                    <div class="mb-3">
                        <label for="episodeBanner" class="form-label">Episodes card</label>
                        <input class="form-control" type="file" name="episodeBanner" id="episodeBanner">
                    </div>
                    <div class="form-group mb-3">
                        <label for="episodes" class="form-label">Episodes</label>
                        <input type="number" placeholder="Ex:12" class="form-control" value="{{old('episodes')}}"
                            name="episodes" id="episodes" aria-describedby="episodes">
                    </div>


                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30"
                        rows="10">{{old('description')}}</textarea>
                </div>

                <div>
                    <button class="btn btn-danger px-5">Save</button>
                </div>


            </form>
        </section>
       



    </section>
</x-layout>