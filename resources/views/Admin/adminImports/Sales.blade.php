<style>
td{
    color:black !important; 
    font-weight:bold !important;
}
</style>

<input id="searchField" type="text" placeholder="Search...">

<table class="table table-hover">
<tr>
  <td>Name</td>
  <td>Description</td>
  <td>%</td>
  <td>From</td>
  <td>To</td>
  <td>Goods</td>
  <td>Action</td>
</tr>
    @foreach($sales as $sale)
<tr name="sale">
  <td>{{ $sale->name }}</td>
  <td>{{ $sale->description }}</td>
  <td>{{ $sale->percentages }}</td>
  <td>{{ $sale->start }}</td>
  <td>{{ $sale->end }}</td>
  <td>{{ count($sale->good) }}</td>
  <td>
      <form action="{{ URL::to('/admin/dropSomeSale') }}" method="POST">
      {{ csrf_field() }}
      <input class="btn btn-danger" type="submit" value="-">
      <input type="hidden" name="saleID" value="{{ $sale->id }}">
      </form>
  </td>
</tr>
    @endforeach
</table>

