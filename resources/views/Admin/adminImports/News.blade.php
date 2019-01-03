<div class="row"
    style="margin-right:50px !important">
    <div class="col-sm">
        <form action="#"
            method="GET">
            <div class="btn-group">
                <input name="search"
                    class="form-control form-control-sm"
                    type="text"
                    placeholder="Search..."
                    style="margin-left:370px; width:300px"
                    required>
                <button class="btn btn-secondary"
                    type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="col-sm">
        <button type="button"
            class="btn btn-secondary">
            <a href="/admin/createNewEvent/" style="color:white">
                <i class="fa fa-plus"></i> Add new event
            </a>
        </button>
    </div>

</div>

@if($searchErr)
<hr>
<div class="alert alert-secondary">
    Ничего не найдено...
</div>
@endif
<hr>

<div id="adminGoodsTable">
    @if (session('error_file_change'))
    <div class="alert alert-danger text-center msg">
        <strong>{{ session('error_file_change') }}</strong>
    </div>
    @endif
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $n)
            <tr>
                <td><b>{{ str_limit($n->name,10,"...") }}</b></td>
                <td>
                    <img style="border-radius: 10px; border: 2px solid lightgrey"
                        src="{{ URL::to('/').$n->image }}"
                        alt="Loading...">
                </td>
                <td>{{ $n->action }}</td>
                <td>
                    <div class="btn-group"
                        role="group">
                        <div>
                            <button type="button"
                                class="btn btn-info"
                                data-toggle="modal"
                                data-target="#exampleModal{{$n->id}}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <div class="modal fade"
                                id="exampleModal{{$n->id}}"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">Edit event: <b>{{ ucfirst($n->name) }}</b></h5>
                                            <br>
                                        </div>
                                        <div class="modal-body">
                                            @include("Admin.adminImports.AdminEventsImports.modalEditForm")
                                        </div>
                                        <div class="modal-footer"
                                            style="margin-right: 100px !important">
                                            <button type="submit"
                                                class="btn btn-info"
                                                onclick="document.getElementById('change-form'+{!! json_encode($n->id) !!}).submit()">Save</button>
                                            <button type="button"
                                                class="btn btn-secondary"
                                                data-dismiss="modal"
                                                style="margin-left:800px !important"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form action="#"
                                method="POST">
                                @csrf
                                <input type="hidden"
                                    name="event"
                                    value="{{ $n->id }}">
                                <input type="hidden"
                                    name="old_image_name"
                                    value="{{ $n->image }}"
                                    accept="image/*">
                                <button type="submit"
                                    class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="alert alert-secondary">
        {{ $news->links() }}
    </div>
    <br>
</div>