<form action="{{ route('search') }}" method="get">
    <input id="s" name="s" placeholder="Искать здесь..." type="search">
    <button type="submit">Поиск</button>
</form>

<a href="{{ route('added_user') }}">Отправить добавленных пользователей</a>

@foreach($userList as $user)
    <div>
        <h2>{{$user['name']}}</h2>
        <p>{{$user['username']}}</p>
        <p>{{$user['email']}}</p>
    </div>
@endforeach



