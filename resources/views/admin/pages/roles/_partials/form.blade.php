@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <input type="text" name="name" autofocus placeholder="Novo cargo" value="{{ $role->name ?? old('name')}}" class="form-control">
</div>
<div class="form-group">
    <textarea name="description" placeholder="Descrição do cargo" cols="30" rows="8" class="form-control">{{ $role->description ?? old('description')}}</textarea>
</div>

<div class="row">
    <div class=" col-sm-3 form-group">
        <a href="{{ route('roles.index') }}" class="btn btn-success form-control">Voltar</a>
    </div>
    <div class=" col-sm-3 form-group">
        <button type="submit" class="btn btn-primary form-control">Enviar</button>
    </div>
</div>
