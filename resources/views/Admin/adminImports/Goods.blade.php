<div class="row"
  style="margin-right:50px !important">
  <div class="col-sm">
    <form action="{{ URL::to('/admin/searchProduct') }}"
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
      <a href="/admin/createNewProduct">
        <i class="fa fa-plus"></i> Add new product
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
        <th scope="col">Raiting</th>
        <th scope="col">Price</th>
        <th scope="col">Categories</th>
        <th scope="col">Sales</th>
        <th scope="col">Likes</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($goods as $good)
      <tr>
        <td><b>{{ str_limit($good->name,10,"...") }}</b></td>
        <td>
          <img style="border-radius: 10px; border: 2px solid lightgrey"
            src="{{ URL::to('/').$good->image }}"
            alt="Loading...">
        </td>
        <td>{{ $good->rating }}</td>
        <td>{{ $good->price }}$/{{ $good->weight_type }}</td>
        <td>
          @if(count($good->categorie)>0)
          @foreach($good->categorie as $cat)
          <i class="fa fa-check"></i>
          <i>
            @if(App::getLocale()=='ru')
            {{ $cat->RUname }}
            @elseif(App::getLocale()=='en')
            {{ $cat->ENname }}
            @else
            {{ $cat->UKname }}
            @endif
          </i>
          <br>
          @endforeach
          @else
          <b>-</b>
          @endif
        </td>
        <td>
          @if(count($good->sale)>0)
          @foreach($good->sale as $s)
          <i class="fa fa-check"></i> <i>{{ $s->name }}</i><br>
          @endforeach
          @else
          <b>-</b>
          @endif
        </td>
        <td>
          @if($good->like)
          <i>{{ count($good->like) }}</i>
          @else
          <i>0</i>
          @endif
        </td>
        <td>
          <div class="btn-group"
            role="group">
            <div>
              <button type="button"
                class="btn btn-info"
                data-toggle="modal"
                data-target="#exampleModal{{$good->id}}">
                <i class="fa fa-edit"></i>
              </button>
              <div class="modal fade"
                id="exampleModal{{$good->id}}"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog"
                  role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"
                        id="exampleModalLabel">Edit product: <b>{{ ucfirst($good->name) }}</b></h5>
                      <br>
                    </div>
                    <div class="modal-body">
                      @include("Admin.adminImports.AdminGoodsImports.modalForm")
                    </div>
                    <div class="modal-footer"
                      style="margin-right: 100px !important">
                      <button type="submit"
                        class="btn btn-info"
                        onclick="document.getElementById('good-change-form'+{!! json_encode($good->id) !!}).submit()">Save</button>
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
              <form action="{{ URL::to('/admin/admin-goods-delete') }}"
                method="POST">
                @csrf
                <input type="hidden"
                  name="good"
                  value="{{ $good->id }}">
                <input type="hidden"
                  name="old_image_name"
                  value="{{ $good->image }}"
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
    {{ $goods->links() }}
  </div>
  <br>
</div>