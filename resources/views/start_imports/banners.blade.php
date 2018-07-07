<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <div style="width: 250px !important;">
                <div class="alert alert-dark"
                     role="alert">{{ __('validation.other.'.'Language').': '.(strtoupper(App::getlocale())) }}</div>
                <br>
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
                            <a href="{{ url('/category/'.$key->id) }}">{{ str_replace('_',' ',(__('validation.categories.'.$key->name) )) }}</a>
                            <span class="badge badge-primary badge-pill"
                                  style="background-color: #84C639 !important">{{ count($key->good) }}</span>
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </nav>
    </div>











