<div class="row">
    <div class="col-md-6">
        <input placeholder="Acerca: Título" name="acercaTitulo" type="text" class="form-control mb-3" value="{!! $contenido["data"]["acerca"]["titulo"] !!}"/>
        <textarea placeholder="Acerca de GDS Tecnología" id="acerca" name="acerca" class="validate ckeditor w-100">{!! $contenido["data"]["acerca"]["texto"] !!}</textarea>
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-success btn-block mb-3 text-uppercase">Editar<i class="fas fa-edit ml-2"></i></button>
        <button type="button" onclick="addNumeros(this)" class="btn btn-dark">Números <i class="fas fa-plus"></i></button>
        <div class="mt-3" id="wrapper-numeros">
            @for ($i = 0; $i < count($contenido["data"]["acerca"]["opciones"]); $i++)
            <div class="row">
                <script>
                    if(window.img === undefined) window.img = 0;
                    window.img ++;
                </script>
                <div class="col-md-5">
                    <input value="{{ $contenido["data"]["acerca"]["opciones"][$i]["numero"] }}" placeholder="Número" name="numero[]" type="number" class="form-control"/>
                </div>
                <div class="col-md-7 position-relative">
                    <i onclick="$(this).closest('.row').remove()" class="fas fa-backspace position-absolute text-danger"></i>
                    <input value="{{ $contenido["data"]["acerca"]["opciones"][$i]["nombre"] }}" placeholder="Nombre" name="nombre[]" type="text" class="form-control"/>
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
        <input placeholder="Misión: Título" name="misionTitulo" type="text" class="form-control mb-3" value="{!! $contenido["data"]["mision"]["titulo"] !!}"/>
        <textarea placeholder="Misión" id="mision" name="mision" class="validate ckeditor w-100">{!! $contenido["data"]["mision"]["texto"] !!}</textarea>
    </div>
    <div class="col-md-6">
        <input placeholder="Valores: Título" name="valorTitulo" type="text" class="form-control mb-3" value="{!! $contenido["data"]["valor"]["titulo"] !!}"/>
        <textarea placeholder="Valores" id="valor" name="valor" class="validate ckeditor w-100">{!! $contenido["data"]["valor"]["texto"] !!}</textarea>
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
    addNumeros = function(t) {
        let target = $("#wrapper-numeros");
        let html = "";
        if(window.img === undefined) window.img = 0;
        window.img ++;
        html += '<div class="row">';
            html += '<div class="col-md-5">';
                html += '<input placeholder="Número" name="numero[]" type="number" class="form-control"/>';
            html += '</div>';
            html += '<div class="col-md-7 position-relative">';
                html += `<i onclick="$(this).closest('.row').remove()" class="fas fa-backspace position-absolute text-danger"></i>`;
                html += '<input placeholder="Nombre" name="nombre[]" type="text" class="form-control"/>';
            html += '</div>';
        html += '</div>';
    
        target.append(html);
    }
    
    $("#wrapper-numeros").sortable({
        axis: "y",
        revert: true,
        scroll: false,
        placeholder: "sortable-placeholder",
        cursor: "move"
    }).disableSelection();
</script>
@endpush