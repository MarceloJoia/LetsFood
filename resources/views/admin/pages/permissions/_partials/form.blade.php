@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <input type="text" name="name" autofocus placeholder="Nome do permissão" value="{{ $permission->name ?? old('name')}}" class="form-control">
</div>
<div class="form-group">
    <textarea name="description" placeholder="Descrição do permissão" cols="30" rows="8" class="form-control">{{ $permission->description ?? old('description')}}</textarea>
</div>

<div class="row">
    <div class=" col-sm-3 form-group">
        <a href="{{ route('permissions.index') }}" class="btn btn-success form-control" title="Voltar para as permissões" alt="Voltar para as permissões"><i class="fas fa-undo-alt"></i> Voltar</a>
    </div>
    <div class=" col-sm-3 form-group">
        <button type="submit" class="btn btn-primary form-control" title="Enviar aterações" alt="Enviar aterações"><i class="fas fa-share-square"></i> Enviar</button>
    </div>
</div>
