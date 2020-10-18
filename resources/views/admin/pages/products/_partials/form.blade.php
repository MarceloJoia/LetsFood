@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label for="title">* Título</label>
    <input type="text" id="title" name="title" autofocus value="{{ $product->title ?? old('title') }}" placeholder="* Título" class="form-control">
</div>

<div class="form-group">
    <label for="price">* Preço</label>
    <input type="text" id="price" name="price" autofocus value="{{ $product->price ?? old('price') }}" placeholder="* R$ 0,000.00" class="form-control">
</div>

<div class="form-group">
    <label for="file">* Imagem</label>
    <input type="file" id="file" name="image" value="{{ $product->image ?? old('image') }}"  class="form-control">
</div>

<div class="form-group">
    <label for="description">* Descrição</label>
    <textarea name="description" id="description" class="form-control" placeholder="* Fale um pouco sobre a categoria" cols="30" rows="6">{{ $product->description ?? old('description') }}</textarea>
</div>
