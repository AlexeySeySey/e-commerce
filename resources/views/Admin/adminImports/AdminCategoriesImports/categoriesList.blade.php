<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="container-fluid">
        <table class="table table-hover" id="categories-table">
            @if(count($categories)!=0)
                @foreach($categories as $key)
                    <tr class="row" id="AdmCatAll{{ $key->id }}">
                        <td class="col"><b>№{{ $loop->iteration }}</b></td>
                        <td class="col" id="AdmCatImg{{ $key->id }}">
                        <img height="170px" width="500px" style="border-radius: 10px; border: 2px solid lightgrey" src="{{ URL::to('/').$key->image}}" alt="Loading...">
                        </td>
                        <td class="col" style="text-align: center; color:black" id="AdmCatName{{ $key->id }}">
                            @if($locale == 'en')
                                {{ $key->ENname }}
                            @elseif($locale == 'ru')
                                {{ $key->RUname }}
                            @elseif($locale == 'uk')
                                {{ $key->UKname }}
                                @else
                                {{ ucwords($locale) }}
                            @endif
                            <br>
                            <p class="alert alert-dark" id="CatGoodCount{{ $key->id }}">
                                <b>{{ count($key->good) }} @lang('validation.other.Varieties')</b></p>
                        </td>
                        <td class="col">
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#exampleModalLong{{ $key->id }}" id="changeadmincat{{ $key->id }}">
                                Изменить <i class="fa fa-edit"></i>
                            </button>
                            <div class="modal fade" id="exampleModalLong{{ $key->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Изменить категорию
                                                <b>{{ $loop->iteration }}.</b></h5>
                                        </div>
                                        <div class="modal-body">

                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Наименование</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Изображение</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div>
                                                        <form action="{{ route('updateCatName') }}" method="POST" class="form-group">
                                                            @csrf
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <input class="form-control" type="text" name="ENname" placeholder="EN" required>
                                                                        <input class="form-control" type="text" name="RUname" placeholder="RU" required>
                                                                        <input class="form-control" type="text" name="UKname" placeholder="UK" required>
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden" name="current_category_id"
                                                                               value="{{ $key->id }}">
                                                                        <input type="submit" class="btn btn-dark" value="Сохранить">
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-danger"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div>
                                                        <form action="{{ route('updateCatImg') }}" method="POST"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <label for="NewimgInp">New Image <b>(~1100x240)</b>:</label>
                                                            <input type="file" id="NewimgInp" class="form-control-file"
                                                                   name="new_categories_image" accept="image/*"
                                                                   value="File" required>
                                                            <br>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <input type="hidden" name="current_category_id"
                                                                               value="{{ $key->id }}">
                                                                        <input type="hidden" name="old_category_image_name"
                                                                               value="{{ $key->image }}">
                                                                        <input type="submit" class="btn btn-dark" value="Сохранить">
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-danger"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <button class="btn btn-danger" id="hideadmincat{{ $key->id }}" onclick="hideCategorie({{ $key->id }})">Убрать <i
                                        class="fa fa-times-circle-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="alert alert-info">
                  ...
                </div>
            @endif
        </table>
    </div>
</div>