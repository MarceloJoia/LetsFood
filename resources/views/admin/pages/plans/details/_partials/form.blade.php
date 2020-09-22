@include('admin.includes.alerts')

@csrf

<div class="col- col-sm-12 form-group">
    <input type="text" name="name" autofocus placeholder="Nome do detalhe" value="{{ $detail->name ?? old('name')}}" class="form-control">
</div>

<div class="row">
    <div class="col- col-sm-3 form-group">
        <a href="{{ route('plans.details.index', $plan->url) }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
    </div>
    <div class="col- col-sm-3 form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="far fa-share-square"></i> Enviar</button>
    </div>
</div>
