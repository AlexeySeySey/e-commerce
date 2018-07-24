<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container-fluid">
        <h1>Add new Category</h1>
        @if(session('upload_error'))
            <div class="container alert alert-danger" id="upload_error">
                {{ __('validation.other.'.session('upload_error')) }}
            </div>
        @endif
        <div class="container-fluid">
            <form action="{{ URL::to('/addCat') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="name">Categorie Name (by {{ App::getLocale() }})</label>
                        <input type="text" class="form-control" id="name" placeholder="Имя категории">
                    </div>
                    @foreach($other_localizations as $key)
                        <div class="form-group">
                            <label for="tranc">Перевод</label>
                            <input type="text" class="form-control" id="tranc"
                                   placeholder="Перевод: {{ $key }}">
                        </div>
                    @endforeach
                </div>
                <input type="submit" value="Send!">
            </form>
        </div>
        <div class="container" id="result"></div>
        <br>
    </div>
</div>