<div class="container-fluid">
    <button class="btn btn-secondary" onclick="usersShowUp()">@lang('validation.other.Users')<i class="fa fa-eye"></i></button>
    <button class="btn btn-secondary" onclick="usersHide()"><i class="fa fa-eye-slash"></i></button>
</div>
<br>
<div class="container-fluid" id="container-for-users-table">
<table class="table table-hover" id="allUsersTable" style="visibility: hidden">
    @if (!empty($users))
    @foreach($users as $key)
        @if(!empty($key))
            <tr>
                <td>№ {{ $loop->iteration }}</td>
                <td>@lang('validation.other.Name'): {{ $key->name }}</td>
                <td>@lang('validation.other.Mail'): {{ $key->email  }}</td>
                <td>@lang('validation.other.Locale'): {{ $key->locale }}</td>
                @if($key->cart==null)
                    <td class="alert alert-danger">@lang('validation.other.Cart is empty')Коризна пуста</td>
                @else
                    @if(count($key->cart)>0)
                        <td class="alert alert-info">@lang('validation.other.Items in the cart'): {{ count($key->cart) }}</td>
                    @else
                        <td class="alert alert-secondary">@lang('validation.other.Items in the cart'): {{ count($key->cart) }}</td>
                    @endif
                @endif
                    @if(!empty($key->user_like))
                        @if(count($key->user_like)>0)
                            <td class="alert alert-info">@lang('validation.other.Liked goods'): {{ count($key->user_like) }}</td>
                        @else
                            <td class="alert alert-secondary">@lang('validation.other.Liked goods'): {{ count($key->user_like) }}</td>
                        @endif
                    @else
                        <td class="alert alert-danger">@lang('validation.other.No goods liked')</td>
                    @endif
                    @if($key->follow!=null)
                        <td class="alert alert-info">@lang('validation.other.Follows the news')</td>
                    @else
                        <td class="alert alert-danger">@lang('validation.other.Not signed for news')</td>
                    @endif
                    @if($key->isBan==1)
                        <td>
                            <div id="{{ '#unbanbutton'.$key->id }}">
                            <buttom class="btn btn-info" onclick="UnBan({{ $key->id }})"><i class="fa fa-user-plus"></i>
                                @lang('validation.other.Unban')
                            </buttom>
                            </div>
                            <span id="{{ '#unban-return-text'.$key->id }}" style="visibility: hidden">@lang('validation.other.Unbanned')</span>
                        </td>
                    @elseif($key->isBan==0)
                        <td>
                            <div id="{{ '#banbutton'.$key->id }}">
                            <button class="btn btn-dark" onclick="Ban({{ $key->id }})"><i class="fa fa-user-times"></i>
                                @lang('validation.other.Ban')
                            </button>
                            </div>
                            <span id="{{ '#ban-return-text'.$key->id }}" style="visibility: hidden">@lang('validation.other.Banned')</span>
                        </td>
                    @endif
            </tr>
        @endif
    @endforeach
        @endif
</table>
</div>