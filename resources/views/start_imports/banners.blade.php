<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <div style="width: 250px !important;">
                <div class="alert alert-dark"
                     role="alert">{{ __('validation.other.'.'Language').': '.(strtoupper($locale)) }}</div>
                <br>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong" style="width: 240px !important;">
                    Показать все
                </button>
                <br><hr>
                <p>
                    <button class="btn btn-secondary" type="button"
                            style="width: 240px !important;" id="categoriesButton" onclick="catButton()">
                        <table>
                            <tr>
                                <td>
                                    <span>@lang('validation.sections.Categories')</span>
                                </td>
                                <td style="width: 100px;"></td>
                                <td>
                                    <i class="fa fa-sort-desc" id="buttonDownCat"></i>
                                </td>
                            </tr>
                        </table>
                    </button>
                </p>
                <div style="visibility:hidden">
                <ul class="list-group" id="collapseExample">
                    @foreach($categories as $key)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ url('/category/'.$key->id) }}">
                                @if($locale == 'en')
                                    {{ $key->ENname }}
                                @elseif($locale == 'ru')
                                    {{ $key->RUname }}
                                @elseif($locale == 'uk')
                                    {{ $key->UKname }}
                                @else
                                    {{ ucwords($locale) }}
                                @endif
                            </a>
                            <span class="badge badge-primary badge-pill"
                                  style="background-color: #84C639 !important">{{ count($key->good) }}</span>
                        </li>
                        @if($loop->iteration==8)
                            @break
                        @endif
                    @endforeach
                </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach($categories as $key)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ url('/category/'.$key->id) }}">
                                    @if($locale == 'en')
                                        {{ $key->ENname }}
                                    @elseif($locale == 'ru')
                                        {{ $key->RUname }}
                                    @elseif($locale == 'uk')
                                        {{ $key->UKname }}
                                    @else
                                        {{ ucwords($locale) }}
                                    @endif
                                </a>
                                <span class="badge badge-primary badge-pill"
                                      style="background-color: #84C639 !important">{{ count($key->good) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>











