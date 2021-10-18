@extends('layouts/base')
@section('title')
    PersonalizeGeek | Signup
@endsection

@section('content')
<div class="grid grid-cols-1 h-screen 2xl:grid-cols-2 mx-auto">

    <section class="col-span-1 md:border-l-2 md:border-gray-100 bg-white h-full">
        <div class="flex flex-col justify-center items-center h-full">
            <h1 class="font-main font-bold text-gray-700 text-3xl">Realizar Cadastro</h1>
            @include('error')
            <form class="mt-5 ml-5 mr-5 hidden md:block" method="POST">
                @csrf
                <div class="flex flex-row">
                    <div class="mr-2 pb-7 border-r-2 border-gray-400">
                        <div>
                            @include('layouts/input', ['placeholder' => 'Nome', 'name' => 'name', 'type' => 'text'])
                        </div>
                        <div>
                            @include('layouts/input', ['placeholder' => 'Telefone/Celular', 'name' => 'phone', 'type' => 'text'])
                        </div>
                        <div class="flex flex-row">
                            @include('layouts/inputsm', ['placeholder' => 'Email', 'name' => 'email', 'type' => 'email'])
                            <select name="gender" id="gender" class="ml-2 w-40 h-10 mt-3.5 focus:ring-transparent focus:outline-none focus:border-gray-800">
                                <option value="gender">Gênero</option>
                                <option value="masculine">Masculino</option>
                                <option value="feminine">Feminino</option>
                                <option value="other">Outro</option>
                            </select>
                        </div>
                        <div>
                            @include('layouts/inputsm', ['placeholder' => 'Senha', 'name' => 'password', 'type' => 'password'])
                            @include('layouts/inputsm', ['placeholder' => 'Confirmar Senha', 'name' => 'password', 'type' => 'password'])
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-row">
                            @include('layouts/inputsm', ['placeholder' => 'Cep', 'name' => 'zip_code', 'type' => 'text'])
                            <div class="w-40 ml-2">
                                <a target="_blank" href="https://buscacepinter.correios.com.br/app/endereco/index.php" class="font-main text-gray-400 break-words">Não sabe seu cep? clique aqui!</a>
                            </div>
                        </div>
                        <div>
                            @include('layouts/inputsm', ['placeholder' => 'Rua', 'name' => 'street', 'type' => 'text'])
                            @include('layouts/inputsm', ['placeholder' => 'Complemento', 'name' => 'complement', 'type' => 'text'])
                        </div>
                        <div class="flex flex-row">
                            @include('layouts/inputsm', ['placeholder' => 'Número', 'name' => 'house_number', 'type' => 'text'])
                            @include('layouts/inputsm', ['placeholder' => 'Bairro', 'name' => 'neighborhood', 'type' => 'text'])
                        </div>
                        <div>
                            @include('layouts/inputsm', ['placeholder' => 'Cidade', 'name' => 'city', 'type' => 'text'])
                            @include('layouts/inputsm', ['placeholder' => 'Estado', 'name' => 'state', 'type' => 'text'])
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="mt-3 group relative w-60 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gray-700 hover:bg-gray-800 transition-colors focus:outline-none focus:ring-transparent">Cadastrar</button>
                </div>
            </form>

            <form class="mt-5 ml-5 mr-5 md:hidden" method="POST">
                @csrf
                <div class="flex flex-col">
                    @include('layouts/input', ['placeholder' => 'Nome', 'name' => 'name', 'type' => 'text'])
                    @include('layouts/input', ['placeholder' => 'Telefone/Celular', 'name' => 'phone', 'type' => 'text'])
                    @include('layouts/input', ['placeholder' => 'Email', 'name' => 'email', 'type' => 'email'])
                    <select name="gender" id="gender" class="mt-4 focus:ring-transparent focus:outline-none focus:border-gray-800">
                        <option value="gender">Gênero</option>
                        <option value="masculine">Masculino</option>
                        <option value="feminine">Feminino</option>
                        <option value="other">Outro</option>
                    </select>
                    @include('layouts/input', ['placeholder' => 'Senha', 'name' => 'password', 'type' => 'password'])
                    @include('layouts/input', ['placeholder' => 'Confirmar Senha', 'name' => 'password', 'type' => 'password'])
                    @include('layouts/input', ['placeholder' => 'Cep', 'name' => 'zip_code', 'type' => 'text'])


                    @include('layouts/input', ['placeholder' => 'Rua', 'name' => 'street', 'type' => 'text'])
                    @include('layouts/input', ['placeholder' => 'Complemento', 'name' => 'complement', 'type' => 'text'])


                    @include('layouts/input', ['placeholder' => 'Número', 'name' => 'house_number', 'type' => 'text'])
                    @include('layouts/input', ['placeholder' => 'Bairro', 'name' => 'neighborhood', 'type' => 'text'])

                    @include('layouts/input', ['placeholder' => 'Cidade', 'name' => 'city', 'type' => 'text'])
                    @include('layouts/input', ['placeholder' => 'Estado', 'name' => 'state', 'type' => 'text'])
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="mt-3 group relative w-60 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gray-700 hover:bg-gray-800 transition-colors focus:outline-none focus:ring-transparent">Cadastrar</button>
                </div>
            </form>
            <span class="mt-2"><a href="/signin" class="font-main text-gray-600 hover:text-gray-800 transition-colors">Já possui conta? Faça login!</a></span>
        </div>
    </section>
    <section class="hidden 2xl:flex">
        <img src="https://tccflama2021.s3.us-east-2.amazonaws.com/products_images/bg2.jpg" alt="bg-login" class="object-cover">
    </section>

</div>
@endsection
