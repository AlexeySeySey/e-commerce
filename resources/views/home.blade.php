@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="container-fluid">
                    <h3>Choose language</h3>
                    <table class="table-hover">
                        <tr>
                            <td>
                    <a href="{{ route('switch','en') }}" class="btn btn-primary">English</a>
                            </td>
                            <td>
                    <a href="{{ route('switch','ru') }}" class="btn btn-primary">Русский</a>
                            </td>
                            <td>
                    <a href="{{ route('switch','uk') }}" class="btn btn-primary">Украинский</a>
                            </td>
                            <td style="width: 200px;"></td>
                        <td>Current Localization: {{App::getLocale()}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
