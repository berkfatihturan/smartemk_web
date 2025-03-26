<div class="export_to_excel">
    <a class="download-btn btn btn-dark btn-sm"
       onclick="openBoxF('inline-block','download-card')">
        <i style="padding: 3px 1px;" class="fas fa-download"></i>
        <span style="margin-left: 3px">Download</span>
    </a>
    <div id="download-card" class="card mt-1 p-2"
         style="display: none; position: absolute; right: 0;background: #f4f6f9; border-radius: .25rem; z-index: 5">
        <div style="display: flex; flex-direction: row; margin-bottom: 10px">
            <div class="mr-2">
                <small>Start:</small>
                <input class="form-control form-control-sm min_input"
                       type="datetime-local">
            </div>
            <div class="ml-2">
                <small>End:</small>
                <input class="form-control form-control-sm max_input"
                       type="datetime-local">
            </div>
        </div>
        <a onclick="btn_download('{{$link}}'@isset($type), {{$type}} @endisset )"
           class="btn btn-dark btn-sm">
            <i class="fas fa-download"></i>
            <span style="margin-left: 3px">Download</span>
        </a>
    </div>
</div>
