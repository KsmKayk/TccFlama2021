<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="https://tccflama2021.s3.us-east-2.amazonaws.com/products_images/icone.png">
    <title>@yield('title')</title>
</head>
<body>
    <div class="w-full overflow-x-hidden flex flex-col" >
        <div class="flex flex-col w-full h-24 md:h-36 rounded-b-md" style="background-color: #1F2229 ">
            <div class="flex flex-row justify-between items-center w-full mt-5">
                <a href="http://localhost/"><img src="https://tccflama2021.s3.us-east-2.amazonaws.com/products_images/nomeSemLogo.png" alt="nome" class="ml-10 w-36"></a>
                <form action="http://localhost/search" method="POST" class="hidden md:flex md:max-w-md lg:max-w-2xl xl:max-w-3xl 2xl:max-w-6xl w-full">
                    @csrf
                    <div class="flex justify-center items-center w-full bg-white rounded-md p-1">
                        <input type="text" name="search" class="w-auto border-0 focus:ring-transparent w-full font-main text-black " placeholder="Camisa naruto">
                        <button class="text-xl md:text-2xl"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <div class="mr-10">
                    <a href="http://localhost/signin" class="text-white mr-3 text-xl md:text-2xl"><i class="fas fa-user"></i></a>
                    <a href="http://localhost/cart" class="text-white text-xl md:text-2xl"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="w-full flex justify-between items-center mt-2 text-white md:mt-7 h-8 text-sm md:h-10 md:text-lg rounded-b-md">
                <a href="http://localhost/shirts" class="ml-3 md:ml-32 font-main">Camisas</a>
                <a href="http://localhost/hoodies" class="font-main">Moletons</a>
                <a href="http://localhost/accessories" class="font-main">Acessórios</a>
                <a href="http://localhost/mugs" class="mr-3 md:mr-32 font-main">Canecas</a>
            </div>
        </div>


        @yield('content')

        <div class="relative mt-auto">
            <div class="w-full flex flex-row  justify-between items-center mt-5 rounded-t-xl" style="background-color: #1F2229 ">
                <div class="flex flex-col ml-5">
                    <a href="http://localhost/about" class="font-main text-lg font-light text-white">Sobre Nós</a>
                    <a href="http://localhost/privacity" class="font-main text-lg font-light text-white">Politica de privacidade</a>
                    <a href="http://localhost/return" class="font-main text-lg font-light text-white">Trocas e Devoluções</a>
                </div>
                <div class="d-flex">
                    <h2 class="font-main text-lg font-light text-white opacity-50">contato@personalizegee.com</h2>
                    <h3 class="font-main text-lg font-light text-white opacity-80">CC Copyright | PersonalizeGeek</h3>
                </div>
                <img src="https://tccflama2021.s3.us-east-2.amazonaws.com/products_images/nomeComLogo.png" alt="" class="w-44  mr-5">
            </div>
           </div>

    </div>

</body>
</html>
