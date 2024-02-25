<x-app-layout>

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
                <h2 class="fs-4  fw-bold m-0 pt-1 f-russo">ADD SEASONS</h2>

            </div>
            <form action="{{route('seasons.store',$midia->id)}}" method="post" data-bs-theme="dark" class="text-light fw-bold"
                enctype="multipart/form-data">
                @csrf

                <div class="d-flex gap-3">

                    <div class="form-group mb-3">
                        <label for="seasons" class="form-label">Seasons</label>
                        <input type="number" placeholder="Ex:2" class="form-control" value="{{old('seasons')}}"
                            name="seasons" id="seasons" aria-describedby="seasons">
                    </div>



                </div>

                <div>
                    <button class="btn btn-danger px-5">Save</button>
                </div>

            </form>
        </section>




    </section>
</x-app-layout>
