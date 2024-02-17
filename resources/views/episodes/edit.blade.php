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

        @isset($episode)
        <section class="pt-5 container">
            <div class="bg-opc d-flex justify-content-center text-danger rounded p-1 mb-3">
                <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">ADD EPISODES</h2>

            </div>
            <form action="{{route('episodes.update',$episode->id)}}" method="post" data-bs-theme="dark"
                class="text-light fw-bold" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="d-flex gap-3">
                    <div class="">

                        <div>
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" placeholder="Ex:Beginig" class="form-control"
                                    value="{{$episode->title}}" name="title" id="title" aria-describedby="title">
                            </div>

                            <div class="mb-3">
                                <label for="banner" class="form-label">Episodes card</label>
                                <input class="form-control" type="file" name="banner" id="banner">

                            </div>
                        </div>




                    </div>
                    <div>
                        <div class="form-group mb-3">
                            <label for="number" class="form-label">Episode</label>
                            <input type="number" placeholder="Ex:12" class="form-control" value="{{$episode->number}}"
                                name="number" id="number" aria-describedby="number">
                        </div>
                        <div class="mb-3">
                            <label for="episode_link" class="form-label">Episode Video link</label>
                            <input class="form-control" type="text" value="{{$episode->episode_link}}" name="episode_link" placeholder="ex:https://link"
                                id="episode_link">

                        </div>
                    </div>
                </div>


                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30"
                        rows="10">{{$episode->description}}</textarea>
                </div>

                <div>
                    <button class="btn btn-danger px-5">Save</button>
                </div>

            </form>
        </section>
        @endisset



    </section>
</x-layout>