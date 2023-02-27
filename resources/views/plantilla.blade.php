<!--inicia plantilla limpia-->
@extends('layouts.master')
@section('titulo','PRUEBA')
@section('contenido')
	
	
@endsection

@push('scripts')
	
@endpush

<input type="hidden" name="route" value="{{url('/')}}">
<!--termina plantilla limplia-->