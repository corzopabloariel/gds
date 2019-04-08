@extends('elementos.main')

@section('headTitle', $title. ' | GDS')
@section('bodyTitle', $title)

@section('body')
<h3 class="title">{{$title}}</h3>
<section>
    <div class="container-fluid">
        <div style="display: none;" id="wrapper-form" class="mt-2">
            <div class="card">
                <div class="card-body">
                    <button onclick="addDelete(this)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" novalidate class="pt-2" action="{{ url('/adm/familia/store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @method("POST")
                        <div class="row justify-content-md-center">
                            
                            <div class="col-5 d-flex align-items-center">
                                <textarea placeholder="Metadatos" name="meta" class="form-control"></textarea>
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <textarea placeholder="Descripción" name="descripcion" class="form-control"></textarea>
                            </div>
                            <div class="col-2 d-flex align-items-center">
                                <button type="submit" class="btn btn-block btn-success mr-1"><i class="fas fa-check"></i></button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mt-2" id="wrapper-tabla">
            <div class="card-body">
                <table class="table table-meta-4 mt-2 mb-0" id="tabla">
                    <thead class="thead-dark">
                        <th class="text-uppercase">Sección</th>
                        <th class="text-uppercase">Metadatos</th>
                        <th class="text-uppercase">Descripción</th>
                        <th class="text-uppercase">acción</th>
                    </thead>
                    <tbody>
                        @if(count($metadatos) != 0)
                            @foreach($metadatos AS $metadato)
                                <tr data-id="{{ $metadato['id'] }}">
                                    <td class="text-uppercase">{!! $metadato["seccion"] !!}</td>
                                    <td>{!! $metadato["meta"] !!}</td>
                                    <td>{!! $metadato["descripcion"] !!}</td>
                                    <td>
                                        <button type="button" onclick="editMetadato({{ $metadato['id'] }}, this)" class="btn btn-warning mr-1"><i class="fas fa-pencil-alt"></i></button>
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
addMetadato = function(t, id = 0, data = null) {
    let btn = $(t);
    if(btn.is(":disabled"))
        btn.removeAttr("disabled");
    else
        btn.attr("disabled",true);
    $("#wrapper-form").toggle(800,"swing");

    action = `{{ url('/adm/empresa/metadato') }}/${id}`;
    
    if(data !== null) {
        console.log(data)
        $(`[name="meta"]`).val(data.meta);
        $(`[name="descripcion"]`).val(data.descripcion);
    }
    elmnt = document.getElementById("form");
    elmnt.scrollIntoView();
    $("#form").attr("action",action);
}
editMetadato = function(id, t) {
    $(t).attr("disabled",true);
    let promise = new Promise(function (resolve, reject) {
        let url = `{{ url('/adm/empresa/metadato') }}/${id}`;
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
                addMetadato($("#btnADD"),parseInt(id),data);
            })
    };
    promiseFunction();
};
addDelete = function(t) {
    addFamilia($("#btnADD"));
    $(`[name="orden"],[name="img"],[name="titulo"]`).val("");
    $("#card-img").attr("src","");
};
</script>
@endpush