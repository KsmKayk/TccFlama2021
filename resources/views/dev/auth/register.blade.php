@extends('dev/head')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="fw-bold">Área de Cadastro</h1>
    <div class="">
        <p class="lead mb-4">Cadastro para poder acessar a Área de ADM</p>
        <div>
            <form method="POST">
                @csrf
                <div class="form-row">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" required class="form-control">
                </div>
                <div class="form-row">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" id="email" required class="form-control">
                </div>
                <div class="form-row">
                    <label for="phone">Telefone/Celular</label>
                    <input type="text" name="phone" id="phone" required class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-auto my-1">
                        <label for="gender">Gênero</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <label for="password">Senha</label>
                    <input type="text" name="password" id="password" required class="form-control">
                </div>


                <div class="form-row">
                    <label for="zip_code">CEP</label>
                    <input type="text" name="zip_code" id="zip_code" required class="form-control">
                </div>
                <div class="form-row">
                    <label for="street">Rua</label>
                    <input type="text" name="street" id="street" required class="form-control">
                </div>
                <div class="form-row">
                    <label for="complement">Complemento</label>
                    <input type="text" name="complement" id="complement" required class="form-control">
                </div>
                <div class="form-row">
                    <label for="house_number">Número</label>
                    <input type="number" name="house_number" id="house_number" required class="form-control">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" name="neighborhood" id="neighborhood" required class="form-control">
                </div>
                <div class="form-row">
                    <label for="city">Cidade</label>
                    <input type="text" name="city" id="city" required class="form-control">

                    <label for="state">Estado</label>
                    <input type="text" name="state" id="state" required class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary px-5 gap-3 mt-2">Cadastrar</button>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
