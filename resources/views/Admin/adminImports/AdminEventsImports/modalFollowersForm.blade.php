<div class="modal fade"
    id="exampleModalLong"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLongTitle">Followers to Notify</h5>
            </div>
            <div id="followers-checkList-new"
                class="modal-body">
                @if(count($followers)>0)
                @foreach($followers as $f)
                <div class="form-check">
                    <input class="form-check-input"
                        type="checkbox"
                        value="{{ $f->id }}"
                        id="defaultCheck1"
                        name="followersNoty[]"
                        checked>
                    <label class="form-check-label"
                        for="defaultCheck1">
                        {{ $f->name }}
                    </label>
                </div>
                @endforeach
                @else
                <div class="alert alert-danger">
                    <b>No followers found</b>
                </div>
                @endif
            </div>
            <div class="modal-footer"
                style="margin-right:300px !important">
                <button class="btn btn-warning"
                    style="color:white"
                    onclick="unfill()">
                    Unfill all
                </button>
                <button type="button"
                    class="btn btn-success"
                    data-dismiss="modal"><i class="fa fa-check"></i> Done</button>
            </div>
        </div>
    </div>
</div>