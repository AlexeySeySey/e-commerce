<form action="{{ URL::to('/admin/editEvent') }}"
    method="POST"
    enctype="multipart/form-data"
    id="change-form{!! json_encode($n->id) !!}">
    @csrf
    <div class="container">
        <div class="row">

            <div class="col-md">
                <b>Name:</b>
                <input class="form-control"
                    type="text"
                    name="name"
                    value="{{ $n->name }}"
                    placeholder="Big cookie sale">
                <br>
                <span><b>Date & Time:</b></span>
                <input class="form-control"
                    type="text"
                    name="datetime"
                    placeholder="1980-05-25 10:56:13"
                    value="{{ $n->action }}">
                <br>
                <span><b>Info:</b></span>
                <textarea class="form-control"
                    type="text"
                    name="info"
                    value="{{ $n->info }}"
                    placeholder="..."></textarea>
            </div>


            <div id="photoEditGood"
                class="col-md">
                <div class="container-fluid">
                    <div class="col-md-6 alert alert-secondary">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <i class="fa fa-image btn btn-secondary"></i>
                                        <input type="file"
                                            id="imgInp"
                                            name="image_up"
                                            accept="image/*"
                                            required>
                                    </span>
                                </span>
                                <input type="text"
                                    name="new_img_name"
                                    class="form-control"
                                    readonly
                                    id="inpt">
                            </div>
                            <img id='img-upload' />
                        </div>
                    </div>
                </div>
                <div class="container"
                    id="result"></div>
                <br>
            </div>
        </div>
        <input type="hidden" name="event" value="{{ $n->id }}">
</form>
<br>