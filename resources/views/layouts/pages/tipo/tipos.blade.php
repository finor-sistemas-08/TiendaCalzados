@extends('layouts.app')
@section('contenido')
    @livewire('web-tipo-calzado',[
        'tipo'=>   $tipo,
    ])
@endsection