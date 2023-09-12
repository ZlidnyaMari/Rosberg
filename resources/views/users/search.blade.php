
@foreach($user as $n)

<form action="{{ route('add') }}" method="get">
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" value="{{ $n['name'] }}" readonly = "readonly">
    </div>
    <div class="form-group">
        <label for="name">Фамилия</label>
        <input type="text" id="username" name="username" value="{{ $n['username'] }}" readonly = "readonly">
    </div>
    <div class="form-group">
        <label for="name">Email</label>
        <input type="text" id="email" name="email" value="{{ $n['email'] }}" readonly = "readonly">
    </div>  

    <button type="submit" class="btn btn-sm btn-outline-secondary">Добавить+</button>
</form>

@endforeach