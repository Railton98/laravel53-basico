@extends('site.template.template1')

@section('content')

<h1>Home Page Teck's!</h1>
{{ $xss }}

@if ($var1 == '1234')
    <p>É igual!</p>
@else
    <p>É diferente!</p>
@endif

@unless ($var1 == 1234)
    <p>Não é igual... unless</p>
@endunless

@for ($i = 0; $i < 10; $i++)
    <p>For: {{$i}}</p>
@endfor

{{--
@if (count($arrayData) > 0)

    @foreach($arrayData as $array)

        <p>Foreach: {{$array}}</p>

    @endforeach
@else
    <p>Não existe Itens</p>
@endif
--}}

@forelse($arrayData as $array)

    <p>Forelse: {{$array}}</p>
    @empty
        <p>Não existe Itens</p>
        
@endforelse

@include('site.includes.sidebar', compact('var1'))

@endsection

@push('scripts')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

@endpush
