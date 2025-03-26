<div class="verticalFilter">
    <div class="stickyVerticalFilter">
        <div class="stickyVerticalFilter__item">
            <div style="display: flex;justify-content: space-between; align-items: center">
                <div class="filter_header">
                    {!! $filter_header !!}
                </div>
                <div class="filter_link" onclick="pushFilter()">
                    <svg class="right-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                                d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="stickyVerticalFilter__item">
            <div>
                <p class="item_header">Search</p>
                @foreach($target_class_list as $key => $list_item)
                    <div class="input-group input-group-sm">
                        <input type="search"
                               onkeyup="search(this,'{{$target_class_list[$key]}}',{{json_encode($target_class_list)}}); restartPaged();"
                               class="form-control form-control-sm" placeholder="{{$search_item_header[$key]}}">
                    </div>
                @endforeach
            </div>
        </div>

        @if($filter_byMinMax_enable)
            @foreach($filter_byMinMax_list_names as $key => $filter_item)
                <div class="stickyVerticalFilter__item pb-4">
                    <div>
                        <p class="item_header">{{$filter_item}}</p>
                        <div id="{{$filter_byMinMax_target_class[$key]}}"
                             style="display: flex; justify-content: space-between; margin: 0;">
                            <div>
                                <input class="form-control form-control-sm min_input" type="number" style="width: 100%"
                                       placeholder="Min">
                            </div>
                            <div style="width: fit-content; text-align: center">
                                <svg style="width: .6rem;  margin: 0 7px" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                            d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/>
                                </svg>
                            </div>
                            <div>
                                <input class="form-control form-control-sm max_input" type="number" style="width: 100%"
                                       placeholder="Max">
                            </div>
                            <div class="btn btn-sm btn-info ml-2"
                                 onclick="a('{{$filter_byMinMax_target_class[$key]}}','{{$filter_byMinMax_target_class[$key]}}'); restartPaged()">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @if($filter_byDate_enable)
            @foreach($filter_byDate_list_names as $key => $filter_item)
                <div class="stickyVerticalFilter__item pb-4">
                    <div>
                        <p class="item_header m-0">{{$filter_item}}</p>
                        <div id="{{$filter_byDate_target_class[$key]}}"
                             style="display: flex; justify-content: space-between; margin: 0; flex-direction: column;align-items: flex-start;">
                            <div>
                                <small>Start:</small>
                                <input class="form-control form-control-sm min_input" type="datetime-local"
                                       style="width: 100%"
                                       placeholder="Min">
                            </div>
                            <div>
                                <small>End:</small>
                                <input class="form-control form-control-sm max_input" type="datetime-local"
                                       style="width: 100%">
                            </div>
                            <div class="btn btn-sm btn-info mt-2"
                                 onclick="b('{{$filter_byDate_target_class[$key]}}','{{$filter_byDate_target_class[$key]}}'); restartPaged()">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <script>
            @isset($default_closed)
                @if($default_closed == true)
                    window.addEventListener("load",(event) => { pushFilter() })
                @endif
            @endisset
        </script>

        <script>
            function a(parent_id, searching_class) {

                var table_item = document.getElementsByClassName("table-item");
                var parent_form = document.getElementById(parent_id);
                var min_input = parent_form.querySelector(".min_input").value;
                var max_input = parent_form.querySelector(".max_input").value;

                if (min_input === "") {
                    min_input = -999999;
                }

                if (max_input === "") {
                    max_input = 999999;
                }

                Array.prototype.forEach.call(table_item, function (item) {
                    var value_of_item = parseInt(item.querySelectorAll(searching_class)[0].innerText);

                    console.log(value_of_item)
                    if (min_input > value_of_item || max_input < value_of_item) {
                        item.style.display = "none"
                    } else {
                        item.style.display = ""
                    }
                });
            }

            function b(parent_id, searching_class) {
                var table_item = document.getElementsByClassName("table-item");
                var parent_form = document.getElementById(parent_id);
                var min_input = Date.parse(parent_form.querySelector(".min_input").value);
                var max_input = Date.parse(parent_form.querySelector(".max_input").value);

                Array.prototype.forEach.call(table_item, function (item) {
                    var value_of_item = Date.parse(item.querySelector(searching_class).innerText);
                    if (min_input > value_of_item || max_input < value_of_item) {
                        item.style.display = "none"
                    } else {
                        item.style.display = ""
                    }
                });
            }
        </script>

        @if($filter_enable)

            @php
                if(isset($custom_filter_pram)){
                    $target_class_list = $custom_filter_pram;
                }
            @endphp
            @foreach($filter_item_names as $key => $filter_item)
                <div class="stickyVerticalFilter__item">
                    <div>
                        <p class="item_header">{{$filter_item}}</p>
                        <div class="">
                            <ul class="{{$target_class_list[$key]}}"
                                style="list-style: none; padding: 0 0 0 10px; max-height: 130px; overflow: auto;">
                                @foreach($uniqueList[$key] as $uniqueItem)
                                    @php
                                        if(isset($relation_keys)){
                                            foreach ($relation_keys[$key] as $rlt){
                                                if($rlt !==""){
                                                    if(isset($uniqueItem->$rlt)){
                                                         $uniqueItem = $uniqueItem->$rlt;
                                                    }

                                                }
                                            }
                                        }
                                    @endphp
                                    @isset($uniqueItem->{$input[$key]})
                                        <li>
                                            <input type="checkbox" class="name_filter_checkbox mr-1"
                                                   value="{{ $uniqueItem->{$input[$key]} }}"
                                                   onchange="select_by(this,'{{$target_class_list[$key]}}','name_filter_checkbox',{{json_encode($target_class_list)}})">
                                            <span>{{ $uniqueItem->{$input[$key]} }}</span>
                                        </li>
                                    @endisset
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<script>
    function pushFilter() {
        var button = document.getElementsByClassName('filter_link')[0];
        var verticalFilter = document.getElementsByClassName('verticalFilter')[0];
        var table = document.getElementsByClassName('table_with_filter')[0];
        button.classList.toggle("active");
        verticalFilter.classList.toggle("filter_collapse");
        table.classList.toggle("max")
    }
</script>
<script>
    function handleScreenWidth() {
        if (window.innerWidth < 768) {
            var button = document.getElementsByClassName('filter_link')[0];
            var verticalFilter = document.getElementsByClassName('verticalFilter')[0];
            var table = document.getElementsByClassName('table_with_filter')[0];
            button.classList.add("active");
            verticalFilter.classList.add("filter_collapse");
            table.classList.add("max")
        }
    }

    // Sayfa yüklendiğinde ve ekran boyutu değiştiğinde işlevi çağırın
    window.addEventListener('resize', handleScreenWidth);
    handleScreenWidth(); // İlk yükleme anında kontrol etmek için
</script>
