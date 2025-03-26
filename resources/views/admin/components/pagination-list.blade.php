<ul class="pagination pagination-sm m-0 float-right">
    <li class="page-item">
        <button class="page-link pagination-button" id="prev-button" aria-label="Previous page"
                title="Previous page" href="#">«
        </button>
    </li>
    <li class="page-item" style="position: relative">
        <button class="page-link pagination-button" onclick="openBox('prePageJumpBox')" id="prev-more" href="#" style="display: none">
            ...
        </button>
        <div id="prePageJumpBox" class="card p-1" style="position: absolute; top:-50px; display: none;flex-direction: row;">
            <input id="jumpPreInput" style="width: 50px;" type="number" min="1">
            <a href="#" onclick="jumpPage('jumpPreInput')" class="btn btn-info btn-sm pr-2 pl-2 pt-1 pb-1 ml-1">Go</a>
        </div>
    </li>

    <div id="pagination-numbers" style="display:contents;">

    </div>
    <li class="page-item" style="position: relative">
        <button class="page-link pagination-button" onclick="openBox('nextPageJumpBox')" id="next-more" style="display: none;">...
        </button>
        <div id="nextPageJumpBox" class="card p-1" style="position: absolute; top:-50px; left: -64px;display: none;flex-direction: row;">
            <input id="jumpNextInput" style="width: 50px;" type="number" min="1">
            <a href="#" onclick="jumpPage('jumpNextInput')" class="btn btn-info btn-sm pr-2 pl-2 pt-1 pb-1 ml-1">Go</a>
        </div>
    </li>
    <li class="page-item">
        <button class="page-link pagination-button" id="next-button" aria-label="Next page"
                title="Next page">»
        </button>
    </li>
</ul>

<script>
    function jumpPage(inputId){
        var pageIndex = document.getElementById(inputId).value;
        var btn = document.querySelector('.pagination-number[page-index="'+pageIndex+'"]'); // page-index değeri 4 olan düğmeyi seç
        if (btn) {
            btn.click(); // Düğmeyi tıkla
        } else {
            console.log("Belirtilen düğme bulunamadı.");
        }
        document.getElementById("nextPageJumpBox").style.display = "none";
        document.getElementById("prePageJumpBox").style.display = "none";
    }
</script>
