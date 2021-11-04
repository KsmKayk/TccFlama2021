@extends('layouts/base')
@section('title')
    PersonalizeGeek
@endsection

@section('content')
<div class="flex flex-col w-screen items-center">
    <div class="flex flex-row mt-5">
        <div class="h-96 flex items-center justify-center border-2 px-6 border-gray-300 rounded-3xl">
            <img src="{{$product->image_url}}" alt="" class=" w-80 rounded-3xl">
        </div>
        <div class="flex flex-col ml-28">
            <h1 class="font-main text-2xl mt-10">@if ($product->category->name == "CAMISAS" || $product->category->name == "MOLETONS" )
                Camiseta anime
            @else
                Produto anime
            @endif | {{$product->name}}</h1>
            <h3 class="font-main text-xl font-medium">R$ {{number_format($product->price,2,',')}}</h3>
            <form method="POST" action="http://localhost/cart/addProduct">
                @csrf
                <div class="mt-28 flex flex-col">

                    <input type="text" name="id" id="id" class="hidden" value="{{$product->id}}">
            @if ($product->category->name == "CAMISAS" || $product->category->name == "MOLETONS")
                 <span class="text-gray-700">Tamanho</span>
                <select name="size" id="size" class="form-select block w-full mt-1 focus:ring-transparent focus:border-gray-600">
                    <option value="pp">PP</option>
                    <option value="p">P</option>
                    <option value="m">M</option>
                    <option value="g">G</option>
                    <option value="gg">GG</option>
                </select>
            @else
            <input type="text" name="size" id="size" class="hidden" value="default">
            @endif



                    <button class="mt-5 items-center p-4 bg-gray-700 text-white hover:bg-gray-900 transition-colors rounded-3xl font-main">
                        Adicionar ao carrinho
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div class="mt-10">
        <h2 class="ml-10 font-main text-3xl font-semibold">Descrição</h2>
        <p class="mt-5 ml-16 mr-16 text-xl font-normal">{{$product->description}}</p>
    </div>
</div>
@endsection
