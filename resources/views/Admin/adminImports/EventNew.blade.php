<form action="{{ URL::to('/admin/saveNewEvent') }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">

            <div class="col-md">
                <b>Name:</b>
                <input class="form-control"
                    type="text"
                    name="name"
                    required
                    placeholder="Big cookie sale">
                <br>
                <span><b>Date & Time:</b></span>
                <input class="form-control"
                    type="text"
                    name="datetime"
                    placeholder="1980-05-25 10:56:13"
                    required>
                <br>
                <span><b>Info:</b></span>
                <textarea class="form-control"
                    type="text"
                    name="info"
                    required
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
                                            name="good_image_up"
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

        <br>

        <div>
        <p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-target
  </button>
</p>

<div class="collapse" id="collapseExample">
  <div class="card card-body">
      <ul>
      @foreach($followers as $follower)
         <li class="btn-group"><input class="form-group" type="checkbox" checked value="{{ $follower->id }}">{{ $follower->email }}</li>
      @endforeach  
      </ul>
</div>
</div>
        </div>
        <hr>
        <br>
        <button type="submit"
            class="btn btn-dark btn-lg"
            style="margin-left:670px;">
            <i class="fa fa-check"></i>
            Save
        </button>
    </div>
    <hr><br><br>
</form>