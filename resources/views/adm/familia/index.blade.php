@extends('elementos.main')

@section('headTitle', $title. ' | GSD')
@section('bodyTitle', $title)

@section('body')
<div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalFamilia">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <button id="btnADDmodal" onclick="addFamiliaModal(this)" class="btn btn-primary text-uppercase" type="button">Agregar<i class="fas fa-plus ml-2"></i></button>
                    </div>
                    <div style="display: none;" id="wrapper-form-modal" class="mt-2">
                        
                        <button onclick="addDeleteModal(this)" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                        <form id="formModal" novalidate class="pt-2" action="{{ url('/adm/familia/store') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="padre_id" id="padre_id" value="">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <img id="card-img-modal" class="w-100 d-block" src="" onError="this.src='{{ asset('images/general/no-img.jpg') }}'" />
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="w-100">
                                        <div class="row">
                                            <div class="col-6">
                                                <input tabindex="1" placeholder="Orden" maxlength="3" name="orden" type="text" class="form-control text-uppercase text-center"/>
                                            </div>
                                            <div class="col-6">
                                                <button tabindex="3" type="submit" class="btn btn-block btn-success mr-1"><i class="fas fa-check"></i></button>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="custom-file">
                                                    <input onchange="readURL(this,'#card-img-modal');" required type="file" name="img" accept="image/*" class="custom-file-input" lang="es">
                                                    <label data-invalid="Seleccione archivo - 304x293" data-valid="Archivo seleccionado" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>
                                                </div>
                                                <small class="form-text text-muted">
                                                La dimensión de la imagen es la recomendada
                                                </small>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <input tabindex="2" placeholder="Nombre" name="titulo" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="mt-2" id="wrapper-tabla-modal">
                        <table class="table table-img-4 mt-2 mb-0" id="tabla-modal">
                            <thead class="thead-dark">
                                <th class="text-uppercase">Orden</th>
                                <th class="text-uppercase">Imagen</th>
                                <th class="text-uppercase">Nombre</th>
                                <th class="text-uppercase">acción</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-uppercase text-center">
                                        sin datos
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h3 class="title">{{$title}}</h3>

<section class="mt-3">
    <div class="container-fluid">
        <div>
            <button id="btnADD" onclick="addFamilia(this)" class="btn btn-primary text-uppercase" type="button">Agregar<i class="fas fa-plus ml-2"></i></button>
        </div>
        <div style="display: none;" id="wrapper-form" class="mt-2">
            <div class="card">
                <div class="card-body">
                    <button onclick="addDelete(this)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" novalidate class="pt-2" action="{{ url('/adm/familia/store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <img id="card-img" class="w-100 d-block" src="" onError="this.src='{{ asset('images/general/no-img.jpg') }}'" />
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="w-100">
                                    <div class="row">
                                        <div class="col-6">
                                            <input tabindex="1" placeholder="Orden" maxlength="3" name="orden" type="text" class="form-control text-uppercase text-center"/>
                                        </div>
                                        <div class="col-6">
                                            <button tabindex="3" type="submit" class="btn btn-block btn-success mr-1"><i class="fas fa-check"></i></button>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="custom-file">
                                                <input onchange="readURL(this);" required type="file" name="img" accept="image/*" class="custom-file-input" lang="es">
                                                <label data-invalid="Seleccione archivo - 304x293" data-valid="Archivo seleccionado" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>
                                            </div>
                                            <small class="form-text text-muted">
                                            La dimensión de la imagen es la recomendada
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <input tabindex="2" placeholder="Nombre" name="titulo" type="text" class="form-control"/>
                                        </div>
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
                        <th class="text-uppercase text-center">Subcategorías</th>
                        <th class="text-uppercase">acción</th>
                    </thead>
                    <tbody>
                        @if(count($familias) != 0)
                            @foreach($familias AS $familia)
                                <tr data-id="{{ $familia['id'] }}">
                                    <td class="text-uppercase">{!! $familia["orden"] !!}</td>
                                    <td><img onError="this.src='{{ asset('images/general/no-img.jpg') }}'" src="{{ asset($familia['img']) }}?t=<?php echo time(); ?>" /></td>
                                    <td>{!! $familia["titulo"] !!}</td>
                                    <td class="text-center">{!! count($familia->hijos) !!}</td>
                                    <td>
                                        <button type="button" onclick="editFamilia({{ $familia['id'] }}, this)" class="btn btn-warning rounded-0"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" onclick="deleteFamilia({{ $familia['id'] }}, this)" class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></button>
                                        <button type="button" onclick="addChild({{ $familia['id'] }}, this)" class="btn btn-dark rounded-0"><i class="fas fa-th-list"></i></button>
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
@push('scripts')
<script>
addChild = function(id, t) {
    let modal = $("#modalFamilia");
    let nombre = $(t).closest("tr").find("td:nth-child(3)").text();
    $("#padre_id").val(id);
    modal.find(".modal-title").html(`Subcategorías de <strong>${nombre}</strong>`);

    let promise = new Promise(function (resolve, reject) {
        let url = `{{ url('/adm/familia/show') }}/${id}`;
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
            .then(function(msg) {
                if(Object.keys(msg.hijos).length > 0) {
                    let html = "";
                    let imgDefault = "{{ asset('images/general/no-img.jpg') }}";
                    msg.hijos.forEach(function (h) {
                        date = new Date();
                        img = `{{ asset('${h.img}') }}?t=${date.getTime()}`;
                        
                        html += `<tr data-id="${h.id}">`;
                            html += `<td class="text-uppercase">${h.orden}</td>`;
                            html += `<td><img onError="this.src='${imgDefault}'" src="${img}" /></td>`;
                            html += `<td>${h.titulo}</td>`;
                            html += `<td>`;
                                html += `<button type="button" onclick="editFamiliaModal(${h.id}, this)" class="btn btn-warning rounded-0"><i class="fas fa-pencil-alt"></i></button>`;
                                html += `<button type="button" onclick="deleteFamiliaModal(${h.id}, this)" class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></button>`;
                            html += `</td>`;
                        html += `</tr>`;
                    });

                    modal.find("table tbody").html(html);
                }
            })
    };
    promiseFunction();

    modal.modal("show");
};
$('#modalFamilia').on('hidden.bs.modal', function (e) {
    $("#modalFamilia").find("table tbody").html("");
})
let deleteFamilia = function(id, t) {
    if(confirm("¿Seguro de eliminar registro (puede contener hijos o estar asociado a productos)?")) {
        $(t).attr("disabled",true);
        let promise = new Promise(function (resolve, reject) {
            let url = `{{ url('/adm/familia/delete') }}/${id}`;
            var xmlHttp = new XMLHttpRequest();
            
            xmlHttp.open( "GET", url, true );
            
            xmlHttp.onload = function() {
                resolve(xmlHttp.responseText);
            }
            xmlHttp.send( null );
        });

        promiseFunction = () => {
            promise
                .then(function(msg) {
                    if(parseInt(msg) == 0) {
                        $("#tabla").find(`tr[data-id="${id}"]`).remove();
                        if($("#tabla").find("tbody").html().trim() == "")
                            $("#tabla").find("tbody").html('<tr><td colspan="4" class="text-uppercase text-center">sin datos</td></tr>');
                    } else {
                        alert(mensaje);
                        $(t).removeAttr("disabled");
                    }
                })
        };
        promiseFunction();
    }
};
deleteFamiliaModal = function(id, t) {
    if(confirm("¿Seguro de eliminar registro (puede estar asociado a productos)?")) {
        $(t).attr("disabled",true);
        let promise = new Promise(function (resolve, reject) {
            let url = `{{ url('/adm/familia/delete') }}/${id}`;
            var xmlHttp = new XMLHttpRequest();
            
            xmlHttp.open( "GET", url, true );
            
            xmlHttp.onload = function() {
                resolve(xmlHttp.responseText);
            }
            xmlHttp.send( null );
        });

        promiseFunction = () => {
            promise
                .then(function(msg) {
                    if(parseInt(msg) == 0) {
                        p = $("#padre_id").val();

                        h = parseInt($(`#tabla tr[data-id="${p}"] td:nth-child(4)`).text());
                        h --;
                        $(`#tabla tr[data-id="${p}"] td:nth-child(4)`).text(h);

                        $("#tabla-modal").find(`tr[data-id="${id}"]`).remove();
                        if($("#tabla-modal").find("tbody").html().trim() == "")
                            $("#tabla-modal").find("tbody").html('<tr><td colspan="4" class="text-uppercase text-center">sin datos</td></tr>');
                    }
                })
        };
        promiseFunction();
    }
};
editFamilia = function(id, t) {
    $(t).attr("disabled",true);
    let promise = new Promise(function (resolve, reject) {
        let url = `{{ url('/adm/familia/edit') }}/${id}`;
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
                addFamilia($("#btnADD"),parseInt(id),data);
            })
    };
    promiseFunction();
};
editFamiliaModal = function(id, t) {
    $(t).attr("disabled",true);
    let promise = new Promise(function (resolve, reject) {
        let url = `{{ url('/adm/familia/edit') }}/${id}`;
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
                addFamiliaModal($("#btnADDmodal"),parseInt(id),data);
            })
    };
    promiseFunction();
};
addFamilia = function(t, id = 0, data = null) {
    let btn = $(t);
    if(btn.is(":disabled"))
        btn.removeAttr("disabled");
    else
        btn.attr("disabled",true);
    $("#wrapper-form").toggle(800,"swing");

    $("#wrapper-tabla").toggle("fast");

    if(id != 0)
        action = `{{ url('/adm/familia/update/') }}/${id}`;
    else
        action = "{{ url('/adm/familia/store') }}";
    if(data !== null) {
        console.log(data)
        $(`[name="orden"]`).val(data.orden);
        $(`[name="titulo"]`).val(data.titulo);
        $("#card-img").attr("src",`{{ url('/') }}/${data.img}`);
    }
    elmnt = document.getElementById("form");
    elmnt.scrollIntoView();
    $("#form").attr("action",action);
};
addFamiliaModal = function(t, id = 0, data = null) {
    let btn = $(t);
    if(btn.is(":disabled"))
        btn.removeAttr("disabled");
    else
        btn.attr("disabled",true);
    $("#wrapper-form-modal").toggle(800,"swing");

    $("#wrapper-tabla-modal").toggle("fast");

    if(id != 0)
        action = `{{ url('/adm/familia/update/') }}/${id}`;
    else
        action = "{{ url('/adm/familia/store') }}";
    if(data !== null) {
        console.log(data)
        $(`[name="orden"]`).val(data.orden);
        $(`[name="titulo"]`).val(data.titulo);
        $("#card-img").attr("src",`{{ url('/') }}/${data.img}`);
    }
    elmnt = document.getElementById("form");
    elmnt.scrollIntoView();
    $("#formModal").attr("action",action);
};
readURL = function(input,target = "#card-img") {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(target).attr(`src`,`${e.target.result}`);
        };
        reader.readAsDataURL(input.files[0]);
    }
};
addDelete = function(t) {
    addFamilia($("#btnADD"));
    $(`[name="orden"],[name="img"],[name="titulo"]`).val("");
    $("#card-img").attr("src","");
};
addDeleteModal = function(t) {
    addFamiliaModal($("#btnADDmodal"));
    $(`[name="orden"],[name="img"],[name="titulo"]`).val("");
    $("#card-img-modal").attr("src","");
};
</script>
@endpush