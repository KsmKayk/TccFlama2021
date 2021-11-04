@extends('layouts/base2')
@section('title')
    PersonalizeGeek
@endsection

@section('content')
    <div class="w-screen mt-10 flex flex-col items-center">
        <h1 class="text-4xl font-main font-bold">Lançamentos</h1>
        <div class="mt-10 ml-2 mr-2 flex flex-col md:flex-row md:justify-between md:w-full md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl">
            @if ($releases->count() > 0)
            @foreach ($releases as $product)
            <a href="http://localhost/product/{{$product->id}}" class="w-80 border-2 border-gray-300 rounded-3xl flex flex-col mb-4">
                <div class="w-72 self-center mt-3">
                    <img src="{{$product->image_url}}" alt="" class="rounded-3xl" >
                </div>
                <div class="mt-2 ml-4 mb-2">
                    <span class="font-main text-gray-500 text-sm">Anime | Geek</span>
                    <p class="mt-4 font-main text-lg font-light">Camisa Anime | {{$product->name}}</p>
                    <p class="mt-2 font-main text-xl font-medium">R$ {{number_format($product->price,2,',')}}</p>
                    <span class="font-main text-gray-500 text-xs font-light">(até 6x sem juros)</span>
                </div>
            </a>
            @endforeach
            @else

            @endif
        </div>

        <h1 class="text-4xl font-main font-bold mt-5">Promoções</h1>

        <div class="mt-10 ml-2 mr-2 flex flex-col md:flex-row md:justify-between md:w-full md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl">
        @if ($products->count() >= 8)
        @for ($i = 0; $i < 4; $i++)
        <a href="http://localhost/product/{{$products[$i]->id}}" class="w-80 border-2 border-gray-300 rounded-3xl flex flex-col mb-4">
            <div class="w-72 self-center mt-3">
                <img src="{{$products[$i]->image_url}}" alt="" class="rounded-3xl" >
            </div>
            <div class="mt-2 ml-4 mb-2">
                <span class="font-main text-gray-500 text-sm">Anime | Geek</span>
                <p class="mt-4 font-main text-lg font-light">Camiseta anime | {{$products[$i]->name}}</p>
                <p class="mt-2 font-main text-xl font-medium">R$ {{number_format($products[$i]->price,2,',')}}</p>
                <span class="font-main text-gray-500 text-xs font-light">(até 6x sem juros)</span>
            </div>
        </a>
        @endfor
        </div>

        <div class="mt-10 ml-2 mr-2 flex flex-col md:flex-row md:justify-between md:w-full md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl">
        @for ($j = 4; $j < 8; $j++)
        <a href="http://localhost/product/{{$products[$j]->id}}"class="w-80 border-2 border-gray-300 rounded-3xl flex flex-col mb-4">
            <div class="w-72 self-center mt-3">
                <img src="{{$products[$j]->image_url}}" alt="" class="rounded-3xl" >
            </div>
            <div class="mt-2 ml-4 mb-2">
                <span class="font-main text-gray-500 text-sm">Anime | Geek</span>
                <p class="mt-4 font-main text-lg font-light">Camiseta anime | {{$products[$j]->name}}</p>
                <p class="mt-2 font-main text-xl font-medium">R$ {{number_format($products[$j]->price,2,',')}}</p>
                <span class="font-main text-gray-500 text-xs font-light">(até 6x sem juros)</span>
            </div>
        </a>
        @endfor
        @else

        @endif
        </div>





    </div>
@endsection
