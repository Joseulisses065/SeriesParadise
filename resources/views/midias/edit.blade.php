<x-layout title="Home">

    <section class="min-vh-100 pt-2">

        <section class="pt-5 container">
            <div class="bg-opc d-flex justify-content-center text-danger rounded p-1 mb-3">
                <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">EDIT MIDIAS</h2>

            </div>
            <form action="{{route('midias.update',$midia->id)}}" method="post" data-bs-theme="dark"
                class="text-light fw-bold" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex gap-3">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" placeholder="Ex:Naruto" value="{{$midia->title}}" class="form-control"
                            name="title" id="title" aria-describedby="title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="categori" class="form-label">Categori</label>
                        <input type="text" placeholder="Ex:Action" class="form-control" value="{{$midia->categori}}"
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
               
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30"
                        rows="10">{{$midia->description}}</textarea>
                </div>
                <div>
                    <button class="btn btn-danger px-5">Save</button>
                </div>


            </form>
        </section>




    </section>
</x-layout>