@if (Session::has('success'))

    <div class="alert alert-custom alert-light-success fade show m-5" role="alert">
        <div class="alert-text">{{Session::get('success')}}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>

@endif
