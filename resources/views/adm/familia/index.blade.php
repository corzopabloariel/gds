@extends('elementos.main')

@section('headTitle', $title. ' | GDS')
@section('bodyTitle', $title)

@section('body')
<h3 class="title">{{$title}}</h3>

<section class="mt-3">
    <div class="container-fluid">
        <div>
            <button id="btnADD" onclick="addSlider(this)" class="btn btn-primary text-uppercase" type="button">Agregar<i class="fas fa-plus ml-2"></i></button>
        </div>
        <div style="display: none;" id="wrapper-form" class="mt-2">
            <div class="card">
                <img id="card-img" class="card-img-top" src="" onError="this.src='{{ asset('images/general/no-img.png') }}'" />

                <div class="card-body">
                    <button onclick="addDelete(this)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" novalidate class="pt-2" action="{{ url('/adm/familia//store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row justify-content-md-center">
                            <div class="col-6 col-md-2">
                                <input placeholder="Orden" maxlength="3" name="orden" type="text" class="form-control text-uppercase text-center"/>
                            </div>
                            <div class="col-6 col-md-5">
                                <div class="custom-file">
                                    <input onchange="readURL(this);" required type="file" name="img" accept="image/*" class="custom-file-input" lang="es">
                                    <label data-invalid="Seleccione archivo - 1350x450" data-valid="Archivo seleccionado" class="custom-file-label mb-0" for="customFileLang"></label>
                                </div>
                            </div>
                            <div class="col-3 col-md-1">
                                <button type="submit" class="btn btn-block btn-success mr-1"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        <fieldset>
                            <legend>Texto</legend>
                            <textarea placeholder="Texto" id="texto" name="texto" class="validate ckeditor w-100"></textarea>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mt-2" id="wrapper-tabla">
            <div class="card-body">
                <table class="table table-img-4 mt-2 mb-0" id="tabla">
                    <thead class="thead-dark">
                        <th class="text-uppercase">Orden</th>
                        <th class="text-uppercase">Imagen</th>
                        <th class="text-uppercase">acción</th>
                    </thead>
                    <tbody>
                        @if(count($familias) != 0)
                            @foreach($familias AS $slider)
                                <tr data-id="{{ $slider['id'] }}">
                                    <td class="text-uppercase">{!! $slider["orden"] !!}</td>
                                    <td><img onError="this.src='{{ asset('images/general/no-img.png') }}'" src="{{ asset($slider['img']) }}?t=<?php echo time(); ?>" /></td>
                                    <td>{!! $slider["texto"] !!}</td>
                                    <td>
                                        <button type="button" onclick="editSlider({{ $slider['id'] }}, this)" class="btn btn-warning mr-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" onclick="deleteSlider({{ $slider['id'] }}, this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-uppercase text-center">
                                    sin datos
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection