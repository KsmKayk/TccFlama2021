@extends('layouts/base')
@section('title')
    PersonalizeGeek | Signin
@endsection

@section('content')
<div class="grid grid-cols-1 h-screen md:grid-cols-2
 md:max-2-3xl lg:grid-cols-3 lg:max-2-6xl mx-auto">
    <section class="hidden md:col-span-1 lg:col-span-2 md:flex">
        <img src="https://tccflama2021.s3.us-east-2.amazonaws.com/products_images/bg2.jpg" alt="bg-login" class="object-cover">
    </section>
    <section class="col-span-1 md:border-l-2 md:border-gray-100 bg-white h-full">
        <div class="flex flex-col justify-center items-center h-full">
            <h1 class="font-main font-bold text-gray-700 text-3xl">Fazer Login</h1>
            @include('error')
            <form class="mt-5" method="POST">
                @csrf
                <div>
                    @include('layouts/input', ['placeholder' => 'Email', 'name' => 'email', 'type' => 'email'])
                </div>
                <div>
                    @include('layouts/input', ['placeholder' => 'Senha', 'name' => 'password', 'type' => 'password'])
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="mt-3 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gray-700 hover:bg-gray-800 transition-colors focus:outline-none focus:ring-transparent">Entar</button>
                </div>
            </form>
            <span class="mt-2"><a href="/signup" class="font-main text-gray-600 hover:text-gray-800 transition-colors">Não tem conta? Cadastre-se já!</a></span>
        </div>
    </section>
</div>
@endsection
