@extends('layouts/base')
@section('title')
    PersonalizeGeek
@endsection

@section('content')
<div class="flex flex-col w-screen items-center">
    <h1 class="mt-8 font-medium font-main text-3xl">Carrinho</h1>
    <form action="">
        <div class="flex flex-col  w-screen mt-8">
            <div class="flex flex-row justify-between items-center ml-20 mr-20 h-56 border-2 mt-7 border-gray-500 rounded-3xl">
                <div class="flex flex-row items-center ml-14">
                    <div class="w-56 p-2 border-2 border-gray-500 rounded-3xl">
                        <img src="https://3494.cdn.simplo7.net/static/3494/sku/quinzentenaconcentraco-camisa-branca-lisa-com-elastico-nas-mangas--p-1517426468386.jpg" alt="" class="w-56 rounded-3xl">
                    </div>
                    <div class="ml-10">
                        <span class="font-main text-gray-500 text-sm">Anime | Geek</span>
                        <p class="mt-4 font-main text-lg font-light">Camiseta anime | Ahegao</p>
                        <p class="mt-2 font-main text-xl font-medium">R$ 59,90</p>
                        <span class="font-main text-gray-500 text-xs font-light">(até 6x sem juros)</span>
                    </div>
                </div>
                <div class="mr-14 flex flex-col items-center justify-center border-gray-500 border-2 p-4 rounded-3xl">
                    <p class="font-main font-light text-2xl">Camiseta anime | Ahegao</p>
                    <p class="font-main font-light  text-2xl">Tamanho G</p>
                </div>
            </div>


            <div class="w-72 self-center">
                <button class="mt-5 w-72 items-center p-4 bg-gray-700 text-white hover:bg-gray-900 transition-colors rounded-3xl font-main">
                    Adicionar ao carrinho
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
