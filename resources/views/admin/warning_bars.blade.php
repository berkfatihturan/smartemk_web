@isset($error)
    <div id="warning-box" class="warning-box">
        <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><strong class="mr-auto">Error!</strong>
                <button onclick="openBox('warning-box')" data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">{{$error}}</div>
        </div>

    </div>

@endisset
