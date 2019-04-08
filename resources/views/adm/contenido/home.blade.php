<div class="row">
    <div class="col-12 col-md-5">
        <button type="submit" style="margin-bottom: 25px;" class="btn btn-success btn-block text-uppercase">Editar<i class="fas fa-edit ml-2"></i></button>

        <div class="custom-file">
            <input onchange="readURL(this, '#card-img');" required type="file" name="img" accept="image/*" class="custom-file-input" lang="es">
            <label data-invalid="Seleccione archivo - 450x450" data-valid="Archivo seleccionado" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>
        </div>

        <img id="card-img" class="w-100 d-block mt-2" src="{{ asset($contenido['data']['img']) }}?t=<?php echo time(); ?>" onError="this.src='{{ asset('images/general/no-img.png') }}'" />
    </div>
    <div class="col-12 col-md-7">
        <input placeholder="Título" name="titulo" type="text" class="form-control" value="{!! $contenido['data']['titulo'] !!}"/>
        <fieldset>
            <legend>Texto</legend>
            <textarea placeholder="Texto" id="texto" name="texto" class="validate ckeditor w-100">{!! $contenido["data"]["texto"] !!}</textarea>
        </fieldset>

        <fieldset>
            <legend><button type="button" onclick="addOpciones(this)" class="btn btn-dark">Opciones <i class="fas fa-plus"></i></button></legend>
            <div id="wrapper-opciones">
                @for ($i = 0; $i < count($contenido["data"]["opciones"]); $i++)
                    <div class="row">
                        <script>
                            if(window.img === undefined) window.img = 0;
                            window.img ++;
                        </script>
                        <div class="col-md-5">
                            <div class="custom-file">
                                <input onchange="readURL(this, '#card-img-{{ $i + 1 }}');" required type="file" name="img_opcion[]" accept="image/*" class="custom-file-input" lang="es">
                                <label data-invalid="Archivo - 33x33" data-valid="Archivo" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>
                            </div>
                        </div>
                        <div class="col-md-1 px-0" style="overflow: hidden; max-height: 38px">
                            <input name="nombreCar[]" type="hidden" value="{{$contenido['data']['opciones'][$i]['img']}}"/>
                            <img id="card-img-{{ $i + 1 }}" class="w-100 d-block" src="{{ asset($contenido['data']['opciones'][$i]['img']) }}?t=<?php echo time(); ?>" onError="this.src='{{ asset('images/general/no-img.png') }}'" />
                        </div>
                        <div class="col-md-6 position-relative">
                            <i onclick="$(this).closest('.row').remove()" class="fas fa-backspace position-absolute text-danger"></i>
                            <input value="{{ $contenido['data']['opciones'][$i]['titulo'] }}" placeholder="Nombre" name="nombre[]" type="text" class="form-control"/>
                        </div>
                    </div>
                @endfor
            </div>
            <p><small class="text-muted">Arrestre los elementos para ordernar</small></p>
        </fieldset>
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
    addOpciones = function(t) {
        let target = $("#wrapper-opciones");
        let html = "";
        if(window.img === undefined) window.img = 0;
        window.img ++;
        html += '<div class="row">';
            html += '<div class="col-md-5">';
                html += '<div class="custom-file">';
                    html += `<input onchange="readURL(this, '#card-img-${window.img}');" required type="file" name="img_opcion[]" accept="image/*" class="custom-file-input" lang="es">`;
                    html += '<label data-invalid="Archivo - 33x33" data-valid="Archivo" class="custom-file-label mb-0" data-browse="Buscar" for="customFileLang"></label>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col-md-1 px-0" style="overflow: hidden; max-height: 38px">';
                html += `<input name="nombreCar[]" type="hidden" value="${window.img}"/>`;
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
            $(target).parent().find("input[type='hidden']").val(0);
        }
    };

    $("#wrapper-opciones").sortable({
        axis: "y",
        revert: true,
        scroll: false,
        placeholder: "sortable-placeholder",
        cursor: "move"
    }).disableSelection();
</script>
@endpush