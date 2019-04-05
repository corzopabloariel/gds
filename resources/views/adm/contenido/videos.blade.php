<h3 style="color: #0E7856">Videos</h3>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success mr-2 text-uppercase">Editar<i class="fas fa-edit ml-2"></i></button>
        <button type="button" onclick="addVideos(this)" class="btn btn-dark">Video <i class="fas fa-plus"></i></button>
    </div>
</div>
<div class="row" id="wrapper-videos">
    @for ($i = 0; $i < count($contenido["data"]); $i++)
    <div class="col-md-6 mt-3 col-12" style="cursor: move">
        <fieldset class="position-relative bg-light">
            <i onclick="$(this).closest('.col-12').remove()" style="right:-10px; top: -10px; font-size:20px; cursor:pointer" class="fas fa-times-circle text-danger position-absolute"></i>
            <div class="input-group mb-3 position-relative">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">youtube.com/watch?v=</span>
                </div>
                <input value="{{$contenido['data'][$i]['video']}}" type="text" class="form-control" name="video[]" aria-describedby="basic-addon3">
                <i onclick="link(this);" class="position-absolute link-video fab fa-youtube"></i>
            </div>
            <input value="{{$contenido['data'][$i]['titulo']}}" placeholder="Título" name="titulo[]" type="text" class="form-control"/>
        </fieldset>
    </div>
    @endfor
</div>


@push('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    addVideos = function(t) {
        let target = $("#wrapper-videos");
        let html = "";

        html += '<div class="col-md-6 mt-3 col-12" style="cursor: move">';
            html += '<fieldset class="position-relative bg-light">';
                html += `<i onclick="$(this).closest('.col-12').remove()" style="right:-10px; top: -10px; font-size:20px; cursor:pointer" class="fas fa-times-circle text-danger position-absolute"></i>`;
                html += '<div class="input-group mb-3 position-relative">';
                    html += '<div class="input-group-prepend">';
                        html += '<span class="input-group-text" id="basic-addon3">youtube.com/watch?v=</span>';
                    html += '</div>';
                    html += '<input type="text" class="form-control" name="video[]" aria-describedby="basic-addon3">';
                    html += '<i onclick="link(this);" class="position-absolute link-video fab fa-youtube"></i>';
                html += '</div>';
                html += '<input placeholder="Título" name="titulo[]" type="text" class="form-control"/>';
            html += '</fieldset>';
        html += '</div>';
        target.append(html);
    }
    link = function(t) {
        let codigo = $(t).parent().find("input").val();
        if(codigo != "")
            window.open(`http://www.youtube.com/watch?v=${codigo}`, '_blank');
            window.open(`http://www.youtube.com`, '_blank');
    }
    
    $("#wrapper-videos").sortable({
        revert: true,
        scroll: false,
        placeholder: "sortable-placeholder",
        cursor: "move"
    }).disableSelection();
</script>
@endpush