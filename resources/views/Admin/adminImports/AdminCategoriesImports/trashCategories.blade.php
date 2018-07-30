<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="container-fluid">
        <table class="table table-hover" id="categories-table">
            @if(count($trashed_categories)==0)
                <div class="alert alert-info">
                    ...
                </div>
            @endif
            @foreach($trashed_categories as $key)
                <tr class="row" id="AdmCatAll{{ $key->id }}">
                    <td class="col">№{{ $loop->iteration }}</td>
                    <td class="col"><img height="170px" width="500px" style="border-radius: 10px; border: 2px solid lightgrey" src="{{ URL::to('/').$key->image}}" alt="-">
                    </td>
                    <td class="col" style="text-align: center; color:black">
                        @if($locale == 'en')
                            {{ $key->ENname }}
                        @elseif($locale == 'ru')
                            {{ $key->RUname }}
                        @elseif($locale == 'uk')
                            {{ $key->UKname }}
                        @else
                            {{ ucwords($locale) }}
                        @endif
                    </td>
                    <td class="col">
                        <button class="btn btn-info" id="aliveadmincat{{ $key->id }}" onclick="restoreCategorie({{ $key->id }})">Восстановить <i
                                    class="fa fa-magic"></i></button>
                        <br>
                        <hr>
                        <button class="btn btn-danger" onclick="dropCategorie({{ $key->id }})"
                                id="dropadmincat{{ $key->id }}">Удалить <i class="fa fa-window-close-o"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>