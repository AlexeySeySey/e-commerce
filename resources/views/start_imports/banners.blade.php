<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <div style="width: 250px !important;">
                <div class="alert alert-dark" role="alert">{{ __('validation.other.'.'Language').': '.(strtoupper(App::getlocale())) }}</div>
                <ul class="list-group">
                    @foreach($categories as $key)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ url('/category/'.$key->id) }}">{{ str_replace('_',' ',(__('validation.categories.'.$key->name) )) }}</a>
                        <span class="badge badge-primary badge-pill" style="background-color: #84C639 !important">{{ count($key->good) }}</span>
                    </li>
                        @endforeach
                </ul>
            </div>
        </nav>
    </div>











