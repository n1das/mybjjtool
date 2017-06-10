@extends('layouts.app')



@section('content')


@component('components')
user
@slot('compname')
Usuarios !!
@endslot
@endcomponent

@stop