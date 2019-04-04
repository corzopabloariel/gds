<h3 style="color: #0E7856">Ecobruma</h3>
<div class="row">
    <div class="col-md-5">
        <textarea id="ecobruma" name="ecobruma" class="validate ckeditor w-100">{!! $contenido["data"]["texto"] !!}</textarea>
    </div>
    <div class="col-md-7">    
        <button type="submit" class="btn btn-success btn-block mb-3 text-uppercase">Editar<i class="fas fa-edit ml-2"></i></button>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">www.youtube.com/watch?v=</span>
            </div>
            <input type="text" class="form-control" id="video" name="video" aria-describedby="basic-addon3">
        </div>
        <button type="button" onclick="addCaracteristicas(this)" class="btn btn-dark">Características <i class="fas fa-plus"></i></button>
        <div class="mt-3" id="wrapper-caracteristicas"></div>
        <p><small class="text-muted">Arrestre los elementos para ordernar</small></p>
    </div>
</div>
<hr/>
<div class="row mt-2">
    <div class="col-md-6">
        <input placeholder="Dinámica: Título" name="dinamicaTitulo" type="text" class="form-control mb-3" value="{!! $contenido["data"]["dinamica"]["titulo"] !!}"/>
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
    
    addCaracteristicas = function(t) {
        let target = $("#wrapper-caracteristicas");
        let html = "";
        if(window.img === undefined) window.img = 0;
        window.img ++;
        html += '<div class="row">';
            html += '<div class="col-md-5">';
                html += '<div class="custom-file">';
                    html += `<input onchange="readURL(this, '#card-img-${window.img}');" required type="file" name="img_opcion[]" accept="image/*" class="custom-file-input" lang="es">`;
                    html += '<label data-invalid="Archivo - 55x55" data-valid="Archivo" class="custom-file-label mb-0" for="customFileLang"></label>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col-md-1 px-0" style="overflow: hidden; max-height: 38px">';
                html += `<img id="card-img-${window.img}" class="w-100 d-block" src="" onError="this.src='{{ asset('images/general/no-img.png') }}'" />`;
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