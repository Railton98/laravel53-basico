@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">Listagem de Produtos!</h1>

<a href="{{route('produtos.create')}}" class="btn btn-lg btn-success btn-add">
    <span class="glyphicon glyphicon-plus"></span>
    Cadastrar
</a>

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th widht="100px">Ações</th>
    </tr>
    @foreach ($produtos as $produto)
    <tr>
        <td>{{$produto->name}}</td>
        <td>{{$produto->description}}</td>
        <td>
            <a href="{{route('produtos.edit', $produto->id)}}" class="edit actions">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="{{route('produtos.show', $produto->id)}}" class="delete actions">
                <span class="glyphicon glyphicon-eye-open"></span>
            </a>
        </td>
    </tr>
    @endforeach
</table>

{!! $produtos->links() !!}

@endsection
