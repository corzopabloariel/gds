<h3 style="color: #0E7856">Clientes</h3>
<div class="row">
    <div class="col-12">
        <textarea id="texto" name="texto" class="validate ckeditor w-100">{!! $contenido["data"]["texto"] !!}</textarea>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-12">
        <button type="button" onclick="addClientes(this)" class="btn btn-dark">Cliente <i class="fas fa-plus"></i></button>
    </div>
</div>
<div class="row" id="wrapper-clientes"></div>

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
    
    $("#wrapper-clientes").sortable({
        revert: true,
        scroll: false,
        placeholder: "sortable-placeholder",
        cursor: "move"
    }).disableSelection();

    addClientes = function(t) {
        let target = $("#wrapper-clientes");
        let html = "";
        if(window.img === undefined) window.img = 0;
        window.img ++;
        html += '<div class="mt-3 col-md-6 cli">';
            html += '<fieldset class="bg-light">';
                html += '<div class="row">';
                    html += '<div class="col-md-8">';
                        html += '<div class="custom-file">';
                            html += `<input onchange="readURL(this, '#card-img-${window.img}');" required type="file" name="img_opcion[]" accept="image/*" class="custom-file-input" lang="es">`;
                            html += '<label data-invalid="Archivo - 290x192" data-valid="Archivo" class="custom-file-label mb-0" for="customFileLang"></label>';
                        html += '</div>';
                        html += '<input placeholder="Nombre" name="nombre[]" type="text" class="form-control mt-2"/>';
                    html += '</div>';
                    html += '<div class="col-md-4 position-relative d-flex align-items-center">';
                        html += `<i onclick="$(this).closest('.cli').remove()" class="fas fa-backspace position-absolute text-danger"></i>`;
                        html += `<img id="card-img-${window.img}" class="w-100 d-block" src="" onError="this.src='{{ asset('images/general/no-img.png') }}'" />`;
                    html += '</div>';
                html += '</div>';
            html += '</fieldset>';
        html += '</div>';
        target.append(html);
    }
</script>
@endpush