@if(session('success'))
    <div id="SeccuessMessage">
        <div class="alert alert-success">
            {{ __('validation.other.Product successfully added to your cart') }}
        </div>
    </div>
@endif
<div class="top-brands">
    <div class="container">
       <h3>{{ __('validation.sections.'.'Hot Offers') }}</h3>
        <div id="goodOfSale" class="table-responsive">
            <table class="table">
                <tr>
                    @foreach($goods as $key)
                <td style="padding: 30px !important; width: 350px !important;">
            <div class="card text-center">
                <div class="card-header">
                    {{ $key->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>{{ $key->percentages }}%</b></h5>
                    <p class="card-text"><i>{{ $key->description }}</i></p>
                    <br>
                    <button class="btn btn-success" onclick="showSaleProducts({{ $key->id }})">@lang('validation.other.Show products')</button>
                </div>
                <div class="card-footer text-muted">
                    <div class="text-center">@lang('validation.other.Valid from'):</div>
                    <div class="text-center">{{ $key->start }}</div>
                    <br>
                    <div class="text-center">@lang('validation.other.Lasts until'):</div>
                    <div class="text-center">{{ $key->end }}</div>
                </div>
            </div>
                </td>
                @if($loop->iteration%3==0)
                    <tr></tr>
                @endif
                @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>