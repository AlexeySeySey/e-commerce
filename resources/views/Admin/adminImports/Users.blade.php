<div class="container-fluid">
    <button class="btn btn-secondary" onclick="usersShowUp()">Пользователи<i class="fa fa-eye"></i></button>
    <button class="btn btn-secondary" onclick="usersHide()"><i class="fa fa-eye-slash"></i></button>
</div>
<br>
<table class="table table-hover" id="allUsersTable" style="visibility: hidden">
    @foreach($users as $key)
        @if(!empty($key))
            <tr>
                <td>№ {{ $loop->iteration }}</td>
                <td>Имя: {{ $key->name }}</td>
                <td>Почта: {{ $key->email  }}</td>
                <td>Локаль: {{ $key->locale }}</td>
                @if($key->cart==null)
                    <td class="alert alert-danger">Коризна пуста</td>
                @else
                    @if(count($key->cart)>0)
                        <td class="alert alert-info">Партий товаров в корзине: {{ count($key->cart) }}</td>
                    @else
                        <td class="alert alert-secondary">Партий товаров в корзине: {{ count($key->cart) }}</td>
                    @endif
                @endif
                    @if(!empty($key->user_like))
                        @if(count($key->user_like)>0)
                            <td class="alert alert-info">Лайкнуто товаров: {{ count($key->user_like) }}</td>
                        @else
                            <td class="alert alert-secondary">Лайкнуто товаров: {{ count($key->user_like) }}</td>
                        @endif
                    @else
                        <td class="alert alert-danger">Товаров не лайкал</td>
                    @endif
                    @if($key->follow!=null)
                        <td class="alert alert-info">Следит за новостями</td>
                    @else
                        <td class="alert alert-danger">На новости не подписан</td>
                    @endif
                    @if($key->ban!=null)
                        <td>
                            {{ ($key->ban)->users_id }}
                            <buttom class="btn btn-info" nclick="UnBan({{ $key->id }})"><i class="fa fa-user-plus"></i>
                                Разбанить
                            </buttom>
                        </td>
                    @else
                        <td id="{{ '#banbutton'.$key->id }}">
                            <button class="btn btn-dark" onclick="Ban({{ $key->id }})"><i class="fa fa-user-times"></i>
                                Забанить
                            </button>
                        </td>
                    @endif
            </tr>
        @endif
    @endforeach
</table>