<x-log.layout title='Login'>

    <section class="log-container d-flex justify-content-center align-items-center">
        <div class="log-form-container rounded">
            <form action="{{Route('user.show')}}" method="post" data-bs-theme="dark">
                @csrf
                <div class="d-flex justify-content-center mb-3"><span><i
                             class="bi bi-browser-edge text-danger fs-1"></i></span></div>
                <div>
                    <div class="form-group   rounded mb-3">
                        <input type="text" name="email" placeholder="E-mail ou usuário" value="{{old('email')}}"
                            class="form-control raunded-input">
                    </div>
                    <div class="form-group rounded mb-2">
                        <input type="password" name="password" value="{{old('password')}}" placeholder="Senha"
                            class="form-control  raunded-input">
                    </div>
                </div>
                <div class=" w-100 mt-3">
                    <button class="btn btn-danger w-100 mb-2">Entrar</button>
                    <p class="text-light p-2">Não possui uma conta? <a class="text-decoration-none text-danger"
                            href="{{Route('user.edit')}}">Criar uma conta</a></p>
                </div>
              
            </form>
          

        </div>
    </section>
</x-log.layout>