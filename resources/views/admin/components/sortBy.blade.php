@if($sortEnable)
        <div class="searchbar-area" style="position: relative; display: flex; justify-content: flex-end">
            <select id="topic_select" class="custom-select"
                    onchange="sortBy('{{$base_url}}','{{$sortBy_url}}')"
                    style="max-width: 15%; min-width: 150px">
                @isset($base_value)
                    <option value="{{$base_value}}" @isset($sortBy) @if($sortBy==$base_value) selected @endif @endisset>
                        Sort by {{ucfirst(trans($base_value_header))}}
                    </option>
                @else
                    <option value="index"
                            @if(Request::url() == $base_url) selected @endif>
                        Sort by Newest
                    </option>
                @endisset
                @foreach($sortItems as $key => $sortName)
                    <option value="{{$sortName}}" @isset($sortBy) @if($sortBy==$sortName) selected @endif @endisset>
                        Sort by {{ucfirst(trans($sortItems_header[$key]))}}
                    </option>
                @endforeach
            </select>
            <label class="checkmark-container mb-0 ml-2 mr-1">
                <input id="isDesc" type="checkbox" @isset($isDesc) @if($isDesc == 'true') checked
                       @endif @endisset onchange="setTimeout(function () {sortBy('{{$base_url}}','{{$sortBy_url}}')}, 1000);">
                <span class="checkmark">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path
                                    d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                        </span>
            </label>
        </div>
@endif
