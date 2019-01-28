<div class="row"
    style="margin-left:350px !important">
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
            </tr>
        </thead>
        <tbody>
            @if(count($news) > 0)
            @foreach($news as $n)
            <tr>
                <td><b>{{ str_limit($n->name,10,"...") }}</b></td>
                <td>
                    <img style="border-radius: 10px; border: 2px solid lightgrey"
                        src="{{ URL::to('/').$n->image }}"
                        alt="Loading...">
                </td>
                @if($n->action > Carbon::now())
                <td>{{ $n->action }}</td>
                @else 
                <td class="alert alert-danger">Expired</td>
                @endif
                <td>
                    <div class="btn-group"
                        role="group">
                        <div>
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
                                                onclick="document.getElementById('change-form'+{!! $n->id !!}).submit()">Save</button>
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
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else 
             <div class="alert alert-warning">
                No Events Found... 
            </div>
            @endif
        </tbody>
    </table>
    <div class="alert alert-secondary">
        {{ $news->links() }}
    </div>
    <br>
</div>