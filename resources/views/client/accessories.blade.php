@extends('layouts/base2')
@section('title')
    PersonalizeGeek
@endsection

@section('content')
<div class="flex flex-col w-screen items-center">
    <div class="flex flex-col  w-screen mt-3">
        @foreach ($products as $product)
        <a href="http://localhost/product/{{$product->id}}" class="flex flex-row justify-between items-center ml-20 mr-20 h-56 border-2 mt-1 border-gray-500 rounded-3xl">
            <div class="flex flex-row items-center ml-14">
                <div class="w-52 p-2 border-2 border-gray-500 rounded-3xl">
                    <img src="{{$product->image_url}}" alt="" class="w-52 rounded-3xl">
                </div>
                <div class="ml-10">
                    <span class="font-main text-gray-500 text-sm">Anime | Geek</span>
                    <p class="mt-4 font-main text-lg font-light">Acessório anime | {{$product->name}}</p>
                    <p class="mt-2 font-main text-xl font-medium">R$ {{number_format($product->price,2,',')}}</p>
                    <span class="font-main text-gray-500 text-xs font-light">(até 6x sem juros)</span>
                </div>
            </div>
        </a>
        @endforeach

    </div>
</div>

@endsection
