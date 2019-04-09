@extends('elementos.page')

@section('headTitle', strtoupper($title). ' | GDS')
@section('bodyTitle', $title)

@section('body')
@include('page.element.' . $title)
@endsection