@csrf
<div class="form-group">
    <input type="text" value="{{ $category->title ?? old('title') }}" name="title" class="form-control" placeholder="Título">
</div>
<div class="form-group">
   <input type="text" value="{{ $category->url ?? old('url') }}"  name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
   <textarea type="text" value="{{ $category->description ?? old('description') }}" name="description" class="form-control" cols="30" rows="10" placeholder="Descrição"></textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>