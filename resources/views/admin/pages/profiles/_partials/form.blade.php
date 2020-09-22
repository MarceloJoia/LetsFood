@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <input type="text" name="name" placeholder="Nome do perfil" value="{{ $profile->name ?? old('name')}}" class="form-control">
</div>
<div class="form-group">
    <textarea name="description" placeholder="Descrição do perfil" cols="30" rows="8" class="form-control">{{ $profile->description ?? old('description')}}</textarea>
</div>

<div class="row">
    <div class=" col-sm-3 form-group">
        <a href="{{ route('profiles.index') }}" class="btn btn-success form-control">Voltar</a>
    </div>
    <div class=" col-sm-3 form-group">
        <button type="submit" class="btn btn-primary form-control">Enviar</button>
    </div>
</div>
