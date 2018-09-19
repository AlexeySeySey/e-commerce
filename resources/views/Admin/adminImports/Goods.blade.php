<div id="adminGoodsTable">
<table class="table table-hover">
  <thead class="thead-secondary">
    <tr>
      <th scope="col">№</th>
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
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $good->name }}</td>
      <td>
      <img style="border-radius: 10px; border: 2px solid lightgrey" src="{{ URL::to('/').$good->image}}" alt="Loading...">                  
      </td>
      <td>{{ $good->rating }}</td>
      <td>{{ $good->price }}</td>
      <td class="btn-group" role="group">
          <button class="btn btn-success" style="margin-right:5px !important"><i class="fa fa-edit"></i></button>
          <button class="btn btn-danger"><i class="fa fa-times"></i></button>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
<div class="alert alert-secondary">
{{ $goods->links() }}
</div>
</div>
