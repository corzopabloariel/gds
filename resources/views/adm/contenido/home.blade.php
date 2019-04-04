<div class="row">
    <div class="col-6">        
        <div class="custom-file">
            <input onchange="readURL(this);" required type="file" name="img" accept="image/*" class="custom-file-input" lang="es">
            <label data-invalid="Seleccione archivo - 450x450" data-valid="Archivo seleccionado" class="custom-file-label mb-0" for="customFileLang"></label>
        </div>

        <img id="card-img" class="w-100 d-block mt-2" src="" onError="this.src='{{ asset('images/general/no-img.png') }}'" />
    </div>
    <div class="col-6">
        <input placeholder="Título" name="titulo" type="text" class="form-control"/>
        
        <fieldset>
            <legend>Texto</legend>
            <textarea placeholder="Texto" id="texto" name="texto" class="validate ckeditor w-100"></textarea>
        </fieldset>
    </div>
</div>