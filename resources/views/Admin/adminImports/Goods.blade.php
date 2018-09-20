<div id="adminGoodsTable">
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
        <td><b>{{ ucfirst($good->name) }}</b></td>
        <td>
          <img style="border-radius: 10px; border: 2px solid lightgrey"
            src="{{ URL::to('/').$good->image}}"
            alt="Loading...">
        </td>
        <td>{{ $good->rating }}</td>
        <td>{{ $good->price }}$/{{ $good->weight_type }}</td>
        <td>
          @if(count($good->categorie)>0)
          @foreach($good->categorie as $cat)
          <i>{{ $cat->name }}</i><br>
          @endforeach
          @else
          <b>-</b>
          @endif
        </td>
        <td>
          @if(count($good->sale)>0)
          @foreach($good->sale as $s)
          <i>{{ $s->name }}</i><br>
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
                      <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                        style="margin-left:800px !important"><i class="fa fa-times"></i></button>
                      <br>
                    </div>
                    <div class="modal-body btn-group">
                      <form id="good-change-form"
                        action="{{ URL::to('/admin/admin-goods-edit') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"
                          name="good"
                          value="{{ $good->id }}">
                        <div>
                          <table class="table">
                            <tr>
                              <td>
                                <b>Name:</b>
                              </td>
                              <td>
                                <input class="form-control"
                                  type="text"
                                  name="name"
                                  value="{{ $good->name }}">
                              </td>
                              <td>
                                <b>Weight:</b>
                              </td>
                              <td>
                                <input type=number
                                  name="weight"
                                  step=0.1
                                  value="{{ $good->weight }}"
                                  class="form-control w-150" />
                              </td>
                            </tr>
                            <tr>
                              <td><b>Price:</b></td>
                              <td><input type=number
                                  name="price"
                                  step=0.1
                                  value="{{ $good->price }}"
                                  class="form-control w-150" /></td>
                              <td><b>Rating:</b></td>
                              <td><input type=number
                                  name="rating"
                                  step=1
                                  value="{{ $good->rating }}"
                                  class="form-control w-150" /></td>
                            </tr>
                          </table>
                          <div>
                            <div class="btn-group"
                              style="width:350px !important">
                              <b>Weight Type:</b>
                              <select name="w_type"
                                class="form-control">
                                <option>l</option>
                                <option>kg</option>
                                <option>th</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="container-fluid">
                          <div class="container-fluid">
                            @csrf
                            <div class="col-md-6 alert alert-secondary"
                              style="margin-left: 200px !important;">
                              <div class="form-group">
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                      <i class="fa fa-image btn btn-secondary"></i>
                                      <input type="file"
                                        id="imgInp"
                                        name="good_image_up"
                                        accept="image/*">
                                    </span>
                                  </span>
                                  <input type="text"
                                    class="form-control"
                                    value="{{ str_replace('/images/','',$good->image) }}"
                                    readonly>
                                </div>
                                <img id='img-upload'
                                  src="{{ URL::to('/').$good->image}}" />
                              </div>
                            </div>
                          </div>
                          <div class="container"
                            id="result"></div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer"
                      style="margin-right: 100px !important">
                      <button type="submit"
                        class="btn btn-info"
                        onclick="document.getElementById('good-change-form').submit()">Save</button>
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
</div>