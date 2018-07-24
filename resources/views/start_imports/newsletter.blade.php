@if(count($follow)==0)
            <div class="newsletter" id="newsMember">
                <div class="container">
                    <div class="w3agile_newsletter_left">
                        <h3>{{ __('validation.other.'.'sign up for our newsletter') }}</h3>
                    </div>
                    <div class="w3agile_newsletter_right">

                        <button type="button" class="btn btn-primary"
                                value="{{ __('validation.other.'.'subscribe now') }}"
                                onclick="addLetterMemeber({{$id}})">
                            <i class="fa fa-bell-o"></i>
                        </button>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
@endif
