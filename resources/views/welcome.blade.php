@extends('elementos.page')

@section('headTitle', $title. ' | GDS')
@section('bodyTitle', $title)

@section('body')
@include('page.element.' . $title)
@endsection