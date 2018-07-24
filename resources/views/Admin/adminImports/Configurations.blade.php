<ul>
    <div class="container-fluid">
        <h4>@lang('validation.other.Current Localization'): <b>{{ ucwords(App::getLocale()) }}</b></h4>
<br>
                    <a href="{{ route('switch','en') }}" class="btn btn-primary">English</a>
<br><br>
                    <a href="{{ route('switch','ru') }}" class="btn btn-primary">Русский</a>
<br><br>
                    <a href="{{ route('switch','uk') }}" class="btn btn-primary">Українська</a>
    </div>
</ul>