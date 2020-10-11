@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <input type="text" name="name" autofocus value="{{ $category->name ?? old('name') }}" placeholder="* Nome do usuário" class="form-control">
</div>
<div class="form-group">
    <textarea name="description" class="form-control" placeholder="* Fale um pouco sobre a categoria" cols="30" rows="6">{{ $category->description ?? old('name') }}</textarea>
</div>

