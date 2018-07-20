<div class="container-fluid">
    <h2>Ваша локалзиация: {{ $locale }}</h2>
</div>
<br>
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
                <label for="name">Categorie Name (by {{ $locale }})</label>
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
<table class="table table-hover">
    <h4>Categories here for change/delete</h4>
    <tbody>
    <tr>
        <td><button type="button" class="btn btn-info" disabled>Изменить</button></td>
        <td><button type="button" class="btn btn-danger" disabled>Удалить</button></td>
    </tr>
    </tbody>
</table>
<h1>AND add A LIST OF ALL categories</h1>