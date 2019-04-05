@extends('elementos.main')

@section('headTitle', $title. ' | GDS')
@section('bodyTitle', $title)

@section('body')
<h3 class="title">{{$title}}</h3>

<section class="mt-3">
    <div class="container-fluid">
        <div>
            <button id="btnADD" onclick="addFamilia(this)" class="btn btn-primary text-uppercase" type="button">Agregar<i class="fas fa-plus ml-2"></i></button>
        </div>
        <div style="" id="wrapper-form" class="mt-2">
            <div class="card">
                <div class="card-body">
                    <button onclick="addDelete(this)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" novalidate class="pt-2" action="{{ url('/adm/familia/producto/store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <input placeholder="Título" name="titulo" type="text" class="form-control" value=""/>
                                <fieldset class="bg-light">
                                    <legend>Descripción</legend>
                                    <textarea placeholder="Texto" id="texto" name="texto" class="validate ckeditor w-100"></textarea>
                                </fieldset>
                                <fieldset class="bg-light">
                                    <legend>Detalle</legend>
                                    <textarea placeholder="detalle" id="detalle" name="detalle" class="validate ckeditor w-100"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <input placeholder="Orden" maxlength="3" name="orden" type="text" class="form-control text-uppercase text-center"/>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn-success mr-1"><i class="fas fa-check"></i></button>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input onchange="readURL(this);" required type="file" name="img" accept="application/pdf,image/jpeg" class="custom-file-input" lang="es">
                                            <label data-invalid="Seleccione archivo" data-valid="Archivo seleccionado" class="custom-file-label mb-0" for="customFileLang"></label>
                                        </div>
                                        <small class="form-text text-muted">
                                        Acepta archivos con extensión PDF y JPG
                                        </small>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <fieldset class="position-relative bg-light">
                                            <div class="input-group position-relative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">youtube.com/watch?v=</span>
                                                </div>
                                                <input value="" type="text" class="form-control" name="video" aria-describedby="basic-addon3">
                                                <i onclick="link(this);" class="position-absolute link-video fab fa-youtube"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Producto destacado?
                                            </label>
                                        </div>
                                        <small class="form-text text-muted">
                                        Aperecerá en el HOME
                                        </small>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <fieldset>
                                            <legend><button type="button" onclick="addOpciones(this)" class="btn btn-dark">Opciones <i class="fas fa-plus"></i></button></legend>
                                            <div id="wrapper-opciones">
                                            </div>
                                            <small class="text-muted">Arrestre los elementos para ordernar</small>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
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
                        <th class="text-uppercase">Nombre</th>
                        <th class="text-uppercase">acción</th>
                    </thead>
                    <tbody>
                        @if(count($productos) != 0)
                            @foreach($productos AS $familia)
                                <tr data-id="{{ $familia['id'] }}">
                                    <td class="text-uppercase">{!! $familia["orden"] !!}</td>
                                    <td><img onError="this.src='{{ asset('images/general/no-img.png') }}'" src="{{ asset($familia['img']) }}?t=<?php echo time(); ?>" /></td>
                                    <td>{!! $familia["titulo"] !!}</td>
                                    <td>
                                        <button type="button" onclick="editFamilia({{ $familia['id'] }}, this)" class="btn btn-warning mr-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" onclick="deleteFamilia({{ $familia['id'] }}, this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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