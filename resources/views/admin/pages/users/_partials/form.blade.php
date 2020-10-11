@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <input type="text" name="name" autofocus value="{{ $user->name ?? old('name') }}" placeholder="* Nome do usuário" class="form-control">
</div>
<div class="form-group">
    <input type="email" name="email" value="{{ $user->email ?? old('email') }}" placeholder="* E-mail" class="form-control">
</div>
<div class="form-group">
    <input type="password" name="password" placeholder="* Senha" class="form-control">
</div>
<div class="form-group">
    <input type="password" name="password_confirmation" placeholder="* Confirme a Senha" class="form-control">
</div>
