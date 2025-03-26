<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
     class="filter_icon" onclick="openBoxBlock('{{$filter_name}}')">
    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
    <path
        d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/>
</svg>
<div id="{{$filter_name}}" class="card filter_box">
    <ul style="list-style: none; padding: 0 10px 0 0">
        @foreach($uniqueList as $uniqueItem)
            <li>
                @isset($relation_key)
                    <input type="checkbox" class="{{$filter_name}}_checkbox mr-2"
                           value="{{$uniqueItem->$relation_key->$input}}" checked
                           onchange="select_by_me({{json_encode($search_keys)}})">
                    <span>
                    {{$uniqueItem->$relation_key->$input}}
                </span>
                @else
                    <input type="checkbox" class="{{$filter_name}}_checkbox mr-2" value="{{$uniqueItem->$input}}"
                           onchange="select_by_me({{json_encode($search_keys)}})">
                    <span>
                    {{$uniqueItem->$input}}
                    </span>
                @endisset
            </li>
        @endforeach
    </ul>

</div>



<script>
    function select_by_me(filterFields){
        const selectedValues = {};
        filterFields.forEach(field => {
            selectedValues[field] = Array.from(document.querySelectorAll(`.${field}_filter_checkbox_checkbox:checked`))
                .map(checkbox => checkbox.value);
        });

        // Tablodaki satırları filtrele
        document.querySelectorAll('.table-item').forEach(row => {
            const showRow = filterFields.every(field => {
                const cell = row.querySelector(`.${field}`);
                const cellText = cell ? cell.textContent.trim() : '';
                return selectedValues[field].length === 0 || selectedValues[field].includes(cellText);
            });

            // Satırı göster veya gizle
            row.style.display = showRow ? '' : 'none';
        });
        changePaginationLimit(10)
        changeCurrentPage(1)
        restartPaged()
    }
</script>
