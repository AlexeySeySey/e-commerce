<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container-fluid">
        <h1>Add new Category</h1>
        <div class="container-fluid">
            <form action="{{ route('addCat') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="imgInp" name="categories_image" accept="image/*">
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
                </div>
                <input type="submit" value="Send!">
            </form>
        </div>
        <div class="container" id="result"></div>
        <br>
    </div>
</div>