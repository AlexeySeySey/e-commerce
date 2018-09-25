<div class="container-fluid">
<form action="{{ URL::to('/admin/searchUser') }}" method="GET">
<div class="btn-group">
<input name="search"
 class="form-control form-control-sm"
 type="text"
 placeholder="Search..."
 style="margin-left:370px; width:300px"
 required>
<button class="btn btn-secondary" type="submit">
<i class="fa fa-search"></i>
</button>
</div>
</form>
<hr>
@if($searchErr)
<div class="alert alert-secondary">
       Ничего не найдено...
</div>
@endif
<div class="container-fluid" id="container-for-users-table">
<table class="table table-hover" id="allUsersTable">
    @if (!empty($users))
    @foreach($users as $key)
        @if(!empty($key))
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>@lang('validation.other.Name'):<br> {{ $key->name }}</td>
                <td>@lang('validation.other.Mail'):<br> {{ $key->email  }}</td>
                <td>@lang('validation.other.Locale'):<br> @if($key->locale) {{ $key->locale }} @else <b>-</b> @endif</td>
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
                            <button class="btn btn-info" onclick="UnBan({{ $key->id }})"><i class="fa fa-user-plus"></i>
                                @lang('validation.other.Unban')
                            </button>
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
</div>