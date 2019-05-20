<h3 style="color: #0E7856">Ecobruma</h3>
<div class="row">
    <div class="col-md-5">
        <textarea id="ecobruma" name="ecobruma" class="validate ckeditor w-100">{!! $contenido["data"]["texto"] !!}</textarea>
    </div>
    <div class="col-md-7">    
        <button type="submit" class="btn btn-success btn-block mb-3 text-uppercase">Editar<i class="fas fa-edit ml-2"></i></button>
        <div class="input-group mb-3 position-relative">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">http://www.youtube.com/watch?v=</span>
            </div>
            <input value="{{ $contenido['data']['video'] }}" type="text" class="form-control" id="video" name="video" aria-describedby="basic-addon3">
            <i onclick="link(this);" class="position-absolute link-video fab fa-youtube"></i>
        </div>
        <hr/>
        <button type="button" onclick="addCaracteristicas(this)" class="btn btn-dark">Características <i class="fas fa-plus"></i></button>
        <div class="mt-3" id="wrapper-caracteristicas">
            @for($i = 0; $i < count($contenido["data"]["caracteristicas"]); $i++)
            <div class="row">
                <script>
                    if(window.img === undefined) window.img = 0;
                    window.img ++;
                </script>
                <div class="col-md-5">
                    <div class="custom-file">
                        <input onchange="readURL(this, '#card-img-{{$i + 1}}');" required type="file" name="img_opcion[]" accept="image/*" class="custom-file-input" lang="es">
                        <label data-invalid="Archivo - 55x55" data-valid="Archivo" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>
                    </div>
                </div>
                <div class="col-md-1 px-0" style="overflow: hidden; max-height: 38px">
                    <input name="nombreCar[]" type="hidden" value="{{$contenido['data']['caracteristicas'][$i]['img']}}" />
                    <img id="card-img-{{$i + 1}}" class="w-100 d-block" src="{{ asset($contenido['data']['caracteristicas'][$i]['img'])}}" onError="this.src='{{ asset('images/general/no-img.jpg') }}'" />
                </div>
                <div class="col-md-6 position-relative">
                    <i onclick="$(this).closest('.row').remove()" class="fas fa-backspace position-absolute text-danger"></i>
                    <input value="{{ $contenido['data']['caracteristicas'][$i]['titulo'] }}" placeholder="Nombre" name="nombre[]" type="text" class="form-control"/>
                </div>
            </div>
            @endfor
        </div>
        <p><small class="text-muted">Arrestre los elementos para ordernar</small></p>
    </div>
</div>
<hr/>
<div class="row mt-2">
    <div class="col-md-6">
        <input placeholder="Dinámica: Título" name="dinamicaTitulo" type="text" class="form-control mb-3" value="{!! $contenido['data']['dinamica']['titulo'] !!}"/>
        <textarea placeholder="Dinámica" id="dinamica" name="dinamica" class="validate ckeditor w-100">{!! $contenido["data"]["dinamica"]["texto"] !!}</textarea>
    </div>
    <div class="col-md-6">
        <input placeholder="Aplicaciones: Título" name="aplicacionesTitulo" type="text" class="form-control mb-3" value="{!! $contenido["data"]["aplicaciones"]["titulo"] !!}"/>
        <textarea placeholder="Aplicaciones" id="aplicaciones" name="aplicaciones" class="validate ckeditor w-100">{!! $contenido["data"]["aplicaciones"]["texto"] !!}</textarea>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).on("ready",function() {
        $(".ckeditor").each(function () {
            CKEDITOR.replace( $(this).attr("name") );
        });
    });
    link = function(t) {
        let codigo = $(t).parent().find("input").val();
        if(codigo != "")
            window.open(`http://www.youtube.com/watch?v=${codigo}`, '_blank');
            window.open(`http://www.youtube.com`, '_blank');
    }
    addCaracteristicas = function(t) {
        let target = $("#wrapper-caracteristicas");
        let html = "";
        if(window.img === undefined) window.img = 0;
        window.img ++;
        html += '<div class="row">';
            html += '<div class="col-md-5">';
                html += '<div class="custom-file">';
                    html += `<input onchange="readURL(this, '#card-img-${window.img}');" required type="file" name="img_opcion[]" accept="image/*" class="custom-file-input" lang="es">`;
                    html += '<label data-invalid="Archivo - 55x55" data-valid="Archivo" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col-md-1 px-0" style="overflow: hidden; max-height: 38px">';
            html += `<input name="nombreCar[]" type="hidden" value="${window.img}"/>`;
                html += `<img id="card-img-${window.img}" class="w-100 d-block" src="" onError="this.src='{{ asset('images/general/no-img.jpg') }}'" />`;
            html += '</div>';
            html += '<div class="col-md-6 position-relative">';
                html += `<i onclick="$(this).closest('.row').remove()" class="fas fa-backspace position-absolute text-danger"></i>`;
                html += '<input placeholder="Nombre" name="nombre[]" type="text" class="form-control"/>';
            html += '</div>';
        html += '</div>';
    
        target.append(html);
    }
    
    readURL = function(input, target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(target).attr(`src`,`${e.target.result}`);
            };
            reader.readAsDataURL(input.files[0]);
            $(target).parent().find("input[type='hidden']").val(0);
        }
    };

    $("#wrapper-caracteristicas").sortable({
        axis: "y",
        revert: true,
        scroll: false,
        placeholder: "sortable-placeholder",
        cursor: "move"
    }).disableSelection();
</script>
@endpush