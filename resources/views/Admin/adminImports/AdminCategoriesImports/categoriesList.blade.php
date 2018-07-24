<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="container-fluid">
        <table class="table table-hover" id="categories-table">
            @if(count($categories)!=0)
                @foreach($categories as $key)
                    <tr class="row">
                        <td class="col"><b>№{{ $loop->iteration }}</b></td>
                        <td class="col"><img height="170px" width="500px" src="{{ URL::to('/') }}/images/upload_cat/{{$key->image}}" alt="-">
                        </td>
                        <td class="col" style="text-align: center; color:black">
                            <h4>{{ __('validation.categories.'.$key->name) }}</h4>
                            <br>
                            <p class="alert alert-dark">
                                <b>{{ count($key->good) }} @lang('validation.other.Varieties')</b></p>
                        </td>
                        <td class="col">
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#exampleModalLong{{$key->id}}">
                                Изменить <i class="fa fa-edit"></i>
                            </button>
                            <div class="modal fade" id="exampleModalLong{{$key->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Изменить категорию
                                                №{{ $key->id }}.</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ URL::to('/updateCat') }}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="name" class="form-control"
                                                                   placeholder="Category Name...">
                                                        </td>
                                                        <td>
                                                            <label for="NewimgInp">New Image:</label>
                                                            <input type="file" id="NewimgInp" class="form-control-file"
                                                                   name="new_categories_image" accept="image/*"
                                                                   value="File">
                                                        </td>
                                                    </tr>
                                                </table>
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
                            <br>
                            <hr>
                            <button class="btn btn-danger" id="{{ '#softDelete'.$key->id }}">Убрать <i
                                        class="fa fa-times-circle-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="alert alert-info">
                    Empty list...
                </div>
            @endif
        </table>
    </div>
</div>