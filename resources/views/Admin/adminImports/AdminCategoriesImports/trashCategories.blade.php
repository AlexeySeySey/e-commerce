<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="container-fluid">
        <table class="table table-hover table-secondary" id="categories-table">
            @if(count($trashed_categories)==0)
                <div class="alert alert-info">
                    Empty list...
                </div>
            @endif
                @foreach($trashed_categories as $key)
                    <tr class="row">
                        <td class="col">№{{ $loop->iteration }}</td>
                        <td class="col"><img height="170px" width="500px" src="{{ asset('/images/'.$key->image) }}">
                        </td>
                        <td class="col" style="text-align: center; color:black">
                            <h4>{{ __('validation.categories.'.$key->name) }}</h4>
                        </td>
                        <td class="col">
                            <button class="btn btn-info">Восстановить <i class="fa fa-magic"></i></button>
                            <br>
                            <hr>
                            <button class="btn btn-danger">Удалить <i class="fa fa-window-close-o"></i></button>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
</div>