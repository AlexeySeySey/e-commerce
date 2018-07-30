<div class="fresh-vegetables">
    <div class="container" onmouseover="showBot()" onmouseout="hideBot()">
       <div class="w3l_fresh_vegetables_grids">
            <div class="col-md-9 w3l_fresh_vegetables_grid_right" id="bottomBlock">
                <table>
                    <tr>
                        <td>
                            <div class="col-md-4 w3l_fresh_vegetables_grid">
                                <div class="w3l_fresh_vegetables_grid1">
                                    <div class="w3l_fresh_vegetables_grid1_rel_pos">
                                        <div class="more m1" style="width: 150px !important;">
                                            <a href="{{ route('products') }}"
                                               class="button--saqui button--round-l button--text-thick"
                                               data-text="@lang('validation.other.Shop Now')">@lang('validation.other.Shop Now')</a>
                                        </div>
                                    </div>
                                    <img src="images/8.jpg" alt=" " class="img-responsive"/>
                                </div>
                            </div>
                        </td>
                        <td>
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
                                <i class="fa fa-check"></i>
                                </li>
                            @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>


                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>

</script>