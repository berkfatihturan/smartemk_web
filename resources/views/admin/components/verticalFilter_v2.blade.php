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
                        <input type="search" id='{{$target_class_list[$key]}}'
                               onkeyup="search_me();"
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
                                <input id="min_{{$filter_byMinMax_target_class[$key]}}"
                                       class="form-control form-control-sm min_input" type="number" style="width: 100%"
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
                                <input id="max_{{$filter_byMinMax_target_class[$key]}}"
                                       class="form-control form-control-sm max_input" type="number" style="width: 100%"
                                       placeholder="Max">
                            </div>
                            <div class="btn btn-sm btn-info ml-2"
                                 onclick="search_me(); restartPaged()">
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
                                <input id="start_{{$filter_byDate_target_class[$key]}}"
                                       class="form-control form-control-sm min_input" type="datetime-local"
                                       style="width: 100%"
                                       placeholder="Min">
                            </div>
                            <div>
                                <small>End:</small>
                                <input id="end_{{$filter_byDate_target_class[$key]}}"
                                       class="form-control form-control-sm max_input" type="datetime-local"
                                       style="width: 100%">
                            </div>
                            <div class="btn btn-sm btn-info mt-2"
                                 onclick="search_me(); restartPaged()">
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
            window.addEventListener("load", (event) => {
                pushFilter()
            })
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

            @isset($filter_target_class_list)
                @php
                    $ul_list = $filter_target_class_list;
                @endphp

            @else
                @php
                    $ul_list = $target_class_list;
                @endphp
            @endisset

            @foreach($filter_item_names as $key => $filter_item)
                <div class="stickyVerticalFilter__item">
                    <div>
                        <p class="item_header">{{$filter_item}}</p>
                        <div class="">
                            <ul class="filter-ul {{$ul_list[$key]}}" id="value_{{$data_filter[$key]}}"
                                data-filter="{{$data_filter[$key]}}"
                                style="list-style: none; padding: 0 0 150px 10px; max-height: 200px; min-height: 100px; overflow: auto;">
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {
        const ulElementList = document.getElementsByClassName('filter-ul');

        Array.prototype.forEach.call(ulElementList, function (ulElement) {
            let page = 1; // Başlangıç sayfası

            function checkScroll() {
                if (ulElement.scrollTop + ulElement.clientHeight >= ulElement.scrollHeight) {
                    var type = ulElement.getAttribute('data-filter');
                    loadMoreData(page, type, ulElement); // Yeni verileri yükle
                }
            }

            // Sayfa yüklendiğinde scroll kontrolünü başlat
            checkScroll();
        });
    });


    const ulElementList = document.getElementsByClassName('filter-ul');

    Array.prototype.forEach.call(ulElementList, function (ulElement) {
        let page = 1; // Başlangıç sayfası
        // Scroll event'ini dinle
        ulElement.addEventListener('scroll', function () {
            if (ulElement.scrollTop + ulElement.clientHeight >= ulElement.scrollHeight) {
                page++; // Sayfayı artır
                var type = ulElement.getAttribute('data-filter');
                loadMoreData(page, type, ulElement); // Yeni verileri yükle

            }
        });
    });


    // AJAX ile daha fazla veri yükle
    function loadMoreData(page, type, parentUl) {
        $.ajax({
            url: '/admin/{{$main_route}}/{{$customRouteLink_forCheckbox ?? "getMoreData"}}?page=' + page + '&&type=' + type, // Laravel'de bu rotayı tanımlamalısın
            type: 'GET',
            beforeSend: function () {
                console.log('Loading more data...');
                console.log(page);
                parentUl.style.padding = "0 0 0px 10px"
            },
            success: function (response) {
                // Gelen verileri ul içine ekle
                response.data.forEach(function (item) {
                    parentUl.innerHTML += `
                    <li>
                        <input type="checkbox" class="filter-checkbox name_filter_checkbox mr-1"
       value="${item.name}" data-filter="${type}"
       onchange="search_me();">
<span>${item.name}</span>
                    </li>
                `;
                });
            },
            error: function (xhr) {
                console.log('Error:', xhr);
            }
        });
    }
</script>

<script>
    function search_me(partNum = 1) {
        console.log("on search...")
        const searchInputList = [];
        @foreach($target_class_list as $key => $list_item)
        searchInputList.push(document.getElementById('{{$target_class_list[$key]}}').value);
        @endforeach

        @isset($filter_byMinMax_target_class)
        @foreach($filter_byMinMax_target_class as $key => $list_item)
        searchInputList.push(document.getElementById('min_{{$filter_byMinMax_target_class[$key]}}').value);
        searchInputList.push(document.getElementById('max_{{$filter_byMinMax_target_class[$key]}}').value);
        @endforeach
        @endisset

        @isset($filter_byDate_target_class)
        @foreach($filter_byDate_target_class as $key => $list_item)
        searchInputList.push(document.getElementById('start_{{$filter_byDate_target_class[$key]}}').value);
        searchInputList.push(document.getElementById('end_{{$filter_byDate_target_class[$key]}}').value);
        @endforeach
        @endisset

        @isset($data_filter)
        @foreach($data_filter as $key => $list_item)
        searchInputList.push(Array.from(document.querySelectorAll('input[data-filter="{{$data_filter[$key]}}"]:checked')).map(checkbox => checkbox.value));
        @endforeach
        @endisset

    sendToServer(partNum, searchInputList)
    }
</script>


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


