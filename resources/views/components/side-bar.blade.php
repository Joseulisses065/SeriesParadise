<aside class="side-bar position-fixed bg-dark text-danger h-100dvh shadow d-flex flex-lg-column  justify-content-between">

    <ul
        class="list-side-bar list-unstyled d-flex flex-row flex-md-column flex-lg-column justify-content-center h-80dvh p-3">
        <a href="{{Route('midias.index')}}" class="text-danger">
            <li class="my-3 icon-link icon-link-houver"><i class="bi bi-house fs-3"></i></li>
        </a>
        @auth
        <a href="{{Route('midias.create')}}" class="text-danger">
            <li class="my-3 icon-link icon-link-hover"><i class="bi bi-plus-circle fs-3"></i></li>
        </a>
     @endauth
      

        
    </ul>
    <a href="#"
            class="d-flex align-items-center justify-content-center p-0 link-danger bg-dark text-decoration-none dropdown-toggle"
            id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle fs-2"></i>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
            <li><a class="dropdown-item" href="{{Route('user.index')}}">Sing in</a></li>
            @auth

            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{Route('user.destroy')}}">Sign out</a></li>
            @endauth
        </ul>

</aside>