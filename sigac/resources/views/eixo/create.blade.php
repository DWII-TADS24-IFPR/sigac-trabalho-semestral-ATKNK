@extends('layout.app')
@section('content')
<div class="container">

    <h1>Criando Eixo:</h1>

    <form action="{{ route('eixo.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>

</div>

@endsection
