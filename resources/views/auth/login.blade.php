@extends('layouts.app')


@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-lg-0 mx-auto mt-6">
                            <div class="row card card-plain">
                                <div class="col-12 card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Auto Evaluación con Telegram</h4>
                                    <p class="mb-0">Descubra su Nivel de Competencia Digital en 10 minutos. Use nuestra evaluación de Telegram</p>
                                    <a href="/digcomp_bot"><img src="{{ asset('./img/qr_telegram.png') }}" alt="qr-telegram" class="qr-telegram"></a>
                                </div>
                                <div class="col-12 card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Acceso</h4>
                                    <p class="mb-0">Ingrese su correo electrónico y contraseña para acceder.</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') ?? 'admin@argon.com' }}" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" value="secret" >
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Recordarme</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-secondary btn-lg w-100 mt-4 mb-0">Acceder</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">
                                        Olvidaste tu clave? Resetea tu comtraseña
                                        <a href="{{ route('reset-password') }}" class="text-primary text-gradient font-weight-bold">aquí</a>
                                    </p>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        No tienes cuenta?
                                        <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Registrarse</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-position-x: center; background-image: url('/public/img/campus_utpl.jpg');
              background-size: cover;">
                                <span class="mask bg-gradient-secondary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">Evaluador de DSI - Digcomp 2.1</h4>
                                <p class="text-white position-relative">Una herramienta necesaria para el momento tecnológico actual.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
