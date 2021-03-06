@extends('elementos.main')

@section('headTitle', $title. ' | GSD')
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
                <img id="card-img" class="card-img-top" src="" onError="this.src='{{ asset('images/general/no-img.jpg') }}'" />

                <div class="card-body">
                    <button onclick="addDelete(this)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" novalidate class="pt-2" action="{{ url('/adm/slider/' . strtolower($seccion) . '/store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="seccion" value="{{ strtolower($seccion) }}" />
                        <div class="row justify-content-md-center">
                            <div class="col-6 col-md-2">
                                <input placeholder="Orden" maxlength="3" name="orden" type="text" class="form-control text-uppercase text-center"/>
                            </div>
                            <div class="col-6 col-md-5">
                                <div class="custom-file">
                                    <input onchange="readURL(this);" required type="file" name="img" accept="image/*" class="custom-file-input" lang="es">
                                    @if($seccion == "ecobruma")
                                        <label data-invalid="Seleccione archivo - 561x534" data-valid="Archivo seleccionado" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>
                                    @else
                                        <label data-invalid="Seleccione archivo - 1350x450" data-valid="Archivo seleccionado" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-3 col-md-1">
                                <button type="submit" class="btn btn-block btn-success mr-1"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        @if($seccion != "ecobruma")
                        <fieldset>
                            <legend>Texto</legend>
                            <textarea placeholder="Texto" id="texto" name="texto" class="validate ckeditor w-100"></textarea>
                        </fieldset>
                        @endif
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
                        @if($seccion != "ecobruma")
                        <th class="text-uppercase">Texto</th>
                        @endif
                        <th class="text-uppercase">acción</th>
                    </thead>
                    <tbody>
                        @if(count($sliders) != 0)
                            @foreach($sliders AS $slider)
                                <tr data-id="{{ $slider['id'] }}">
                                    <td class="text-uppercase">{!! $slider["orden"] !!}</td>
                                    <td><img onError="this.src='{{ asset('images/general/no-img.jpg') }}'" src="{{ asset($slider['img']) }}?t=<?php echo time(); ?>" /></td>
                                    @if($seccion != "ecobruma")
                                        <td>{!! $slider["texto"] !!}</td>
                                    @endif
                                    <td>
                                        <button type="button" onclick="editSlider({{ $slider['id'] }}, this)" class="btn btn-warning mr-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" onclick="deleteSlider({{ $slider['id'] }}, this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                @if($seccion != "ecobruma")
                                    <td colspan="4" class="text-uppercase text-center">
                                        sin datos
                                    </td>
                                @else
                                    <td colspan="3" class="text-uppercase text-center">
                                        sin datos
                                    </td>
                                @endif
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
$(document).on("ready",function() {
    $(".ckeditor").each(function () {
        CKEDITOR.replace( $(this).attr("name") );
    });
});
readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#card-img").attr(`src`,`${e.target.result}`);
        };
        reader.readAsDataURL(input.files[0]);
    }
};

let deleteSlider = function(id, t) {
    $(t).attr("disabled",true);
    let promise = new Promise(function (resolve, reject) {
        let url = `{{ url('/adm/slider/delete') }}/${id}`;
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", url, true );
        
        xmlHttp.send( null );
        resolve(xmlHttp.responseText);
    });

    promiseFunction = () => {
        promise
            .then(function(msg) {
                $("#tabla").find(`tr[data-id="${id}"]`).remove();
                if($("#tabla").find("tbody").html().trim() == "")
                    $("#tabla").find("tbody").html('<tr><td colspan="4" class="text-uppercase text-center">sin datos</td></tr>');
            })
    };
    promiseFunction();
};
editSlider = function(id, t) {
    $(t).attr("disabled",true);
    let promise = new Promise(function (resolve, reject) {
        let url = `{{ url('/adm/slider/edit') }}/${id}`;
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.responseType = 'json';
        xmlHttp.open( "GET", url, true );
        xmlHttp.onload = function() {
            resolve(xmlHttp.response);
        }
        xmlHttp.send( null );
    });

    promiseFunction = () => {
        promise
            .then(function(data) {
                $(t).removeAttr("disabled");
                addSlider($("#btnADD"),parseInt(id),data);
            })
    };
    promiseFunction();
};
addSlider = function(t, id = 0, data = null) {
    let btn = $(t);
    if(btn.is(":disabled"))
        btn.removeAttr("disabled");
    else
        btn.attr("disabled",true);
    $("#wrapper-form").toggle(800,"swing");

    $("#wrapper-tabla").toggle("fast");

    if(id != 0)
        action = `{{ url('/adm/slider/update/') }}/${id}`;
    else
        action = "{{ url('/adm/slider/' . strtolower($seccion) . '/store') }}";
    if(data !== null) {
        $(`[name="orden"]`).val(data.orden);
        CKEDITOR.instances['texto'].setData(data.texto);
        $("#card-img").attr("src",`{{ url('/') }}/${data.img}`);
    }
    elmnt = document.getElementById("form");
    elmnt.scrollIntoView();
    $("#form").attr("action",action);
};
addDelete = function(t) {
    addSlider($("#btnADD"));
    $(`[name="orden"],[name="img"]`).val("");
    CKEDITOR.instances['texto'].setData('');
    $("#card-img").attr("src","");
};
</script>
@endpush