@extends('layouts/base')
@section('title')
    PersonalizeGeek
@endsection

@section('content')
<div class="flex flex-col w-screen items-center">
    <h1 class="mt-8 font-medium font-main text-3xl">Carrinho</h1>
    <form action="">
        <div class="flex flex-col  w-screen mt-8">
            @if ($items->count() >0)
            @foreach ($items as $item)
            <div class="flex flex-row justify-between items-center ml-20 mr-20 h-56 border-2 mt-7 border-gray-500 rounded-3xl">
                <div class="flex flex-row items-center ml-14">
                    <div class="w-52 p-2 border-2 border-gray-500 rounded-3xl">
                        <img src="{{$item->attributes->image}}" alt="" class="w-52 rounded-3xl">
                    </div>
                    <div class="ml-10">
                        <span class="font-main text-gray-500 text-sm">Anime | Geek</span>
                        <p class="mt-4 font-main text-lg font-light">{{$item->name}}</p>
                        <p class="mt-2 font-main text-xl font-medium">R$ {{number_format($item->price,2,',')}}</p>
                        <span class="font-main text-gray-500 text-xs font-light">(até 6x sem juros)</span>
                    </div>
                </div>
                <div class="mr-14 flex flex-col items-center justify-center ml-96 border-gray-500 border-2 p-4 rounded-3xl">
                    <p class="font-main font-light text-2xl">{{$item->name}}</p>
                    <p class="font-main font-light  text-2xl">Tamanho {{$item->attributes->size}}</p>
                </div>

                <div class="self-stretch -ml-96 -pl- mr-5 mt-5">


                        <a href="http://localhost/cart/removeProduct/{{$item->id}}" class="font-medium text-2xl text-red-700"><i class="far fa-trash-alt"></i></a>

                </div>
            </div>
            @endforeach

                <a href="{{ route('make.payment') }}"  class="mt-10 self-center text-center w-72 p-4 bg-gray-700 text-white hover:bg-gray-900 transition-colors rounded-3xl font-main">
                    Comprar
                </a>
            @else
                <h2 class="self-center font-light font-main mt-10 text-3xl">Você ainda não adicionou nada ao seu carrinho!</h2>
            @endif



        </div>
    </form>
</div>
@endsection
