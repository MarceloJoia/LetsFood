@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <input type="text" name="name" autofocus value="{{ $plan->name ?? old('name') }}" placeholder="* Nome do plano" class="form-control">
</div>
<div class="form-group">
    <input type="text" name="price" value="{{ $plan->price ?? old('price') }}" placeholder="* Preço do plano" class="form-control">
</div>
<div class="form-group">
    <textarea name="description" name="description" cols="30" rows="8" placeholder="Faça um comentário sobre o plano" class="form-control">{{ $plan->description ?? old('description') }}</textarea>
</div>
