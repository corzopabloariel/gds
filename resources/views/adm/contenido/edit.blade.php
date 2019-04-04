@extends('elementos.main')

@section('headTitle', $title . " | GDS")
@section('bodyTitle', $title)

@section('body')

<h3 class="title">{{$title}}</h3>

<section>
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="seccion" value="{{ strtolower($seccion) }}" />
                @switch($seccion)
                    @case("home")
                        @include('adm.contenido.home')
                    @break
                @endswitch
            </div>
        </div>
    </div>
</section>
@endsection