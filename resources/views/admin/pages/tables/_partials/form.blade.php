@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <input type="text" name="identify" autofocus value="{{ $table->identify ?? old('identify') }}" placeholder="* Identificador da mesa" class="form-control">
</div>
<div class="form-group">
    <textarea name="description" class="form-control" placeholder="* Fale um pouco sobre o identificador" cols="30" rows="6">{{ $table->description ?? old('name') }}</textarea>
</div>
