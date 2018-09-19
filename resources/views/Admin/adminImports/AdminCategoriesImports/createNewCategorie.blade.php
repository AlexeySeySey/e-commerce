<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container-fluid">
        <div class="container-fluid">
            <form action="{{ route('addCat') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 alert alert-secondary" style="margin-left: 250px !important;">
                    <div class="form-group">
                        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    <i class="fa fa-image btn btn-secondary"></i><input type="file" id="imgInp" name="categories_image" accept="image/*">
                </span>
            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="ENname" placeholder="EN" required>
                        <input class="form-control" type="text" name="RUname" placeholder="RU" required>
                        <input class="form-control" type="text" name="UKname" placeholder="UK" required>
                    </div>
                    <button type="submit" class="btn btn-dark" style="margin-left: 480px !important">
                    <i class="fa fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="container" id="result"></div>
        <br>
    </div>
</div>