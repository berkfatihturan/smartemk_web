<style>
    .draggableIframe {
        border: 1px solid #ccc;
        position: absolute;
        resize: both;
        overflow: auto;
        z-index: 10000;
        background-color: #fff;
    }

    .external_page-header {
        background-color: #F5F5F5;
        cursor: move;
        padding: 10px;
        text-align: center;
        position: relative;
    }

    .external_page-closeBtn, .minimizeBtn,.maximizeBtn{
        font-size: 18px;
        font-weight: 900;
        border: none;
        padding: 2px 10px;
        cursor: pointer;
        border-radius: 3px;
    }

    .external_page-closeBtn{
        position: absolute;
        right: 7px;
        top: 6px;
        background-color: red;
        color: white;
    }

    .minimizeBtn {
        position: absolute;
        right: 43px;
        top: 6px;
    }

    #minimizedContainer {
        position: fixed;
        bottom: 0px;
        right: 10px;
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .maximizeBtn{
        font-size: 14px;
        font-weight: 900;
        border: none;
        padding: 2px 7px;
        cursor: pointer;
        border-radius: 3px;
        margin-right: 4px;
        background: white;
        color: black;
    }

    .minimizedBtn {
        color: white;
        background: #17a2b8;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        font-size: 18px;
        padding-top: 5px;
        padding-bottom: 10px;
    }

    .minimizedBtn:hover{
        opacity: .8;
    }

    /* Genelde tüm tarayıcılarda çalışır */
    .draggableIframe {
        overflow: -moz-scrollbars-none; /* Firefox için */
        overflow: hidden; /* Diğer tarayıcılar için */
    }

    .draggableIframe::-webkit-scrollbar {
        display: none; /* Webkit tabanlı tarayıcılarda (Chrome, Safari) scroll bar'ı gizler */
    }
</style>

<div id="iframeContainer" style=""></div>
<div id="minimizedContainer"></div>

<script>
    var highestZIndex = 10000;
    var minimizedWindows = {};

    function updateMinimizedWindows() {
        var minimizedContainer = document.getElementById('minimizedContainer');
        minimizedContainer.innerHTML = ''; // Önceki simgeleri temizle

        for (var id in minimizedWindows) {
            if (minimizedWindows.hasOwnProperty(id)) {
                var windowDiv = minimizedWindows[id];
                var miniBtn = document.createElement('button');
                miniBtn.className = 'minimizedBtn';
                miniBtn.innerHTML = `<div class="maximizeBtn ">_</div> ${windowDiv.title}`;
                miniBtn.onclick = (function (windowId) {
                    return function () {
                        var windowDiv = minimizedWindows[windowId];
                        windowDiv.style.display = 'block';
                        delete minimizedWindows[windowId];
                        updateMinimizedWindows();
                    };
                })(id);

                minimizedContainer.appendChild(miniBtn);
            }
        }
    }
    function openIframe(url, top, left, width, height,title="WMS") {

        var iframeDiv = document.createElement('div');
        iframeDiv.className = 'draggableIframe';


        // Ekran boyutlarına göre boyutları ayarla
        var isMobileOrTablet = window.innerWidth <= 768 || window.innerHeight <= 768; // Basit bir kontrol
        if (isMobileOrTablet) {
            width = window.innerWidth * 0.98;
            height = window.innerHeight * 0.98;
            top = (window.innerHeight - height) / 2;
            left = (window.innerWidth - width) / 2;
        }

        iframeDiv.style.top = top + 'px';
        iframeDiv.style.left = left + 'px';
        iframeDiv.style.width = width + 'px';
        iframeDiv.style.height = height + 'px';
        iframeDiv.style.zIndex = ++highestZIndex; // Z-index değerini ayarla

        var header = document.createElement('div');
        header.className = 'external_page-header';
        header.innerHTML = title;
        iframeDiv.appendChild(header);

        var closeBtn = document.createElement('button');
        closeBtn.className = 'external_page-closeBtn';
        closeBtn.innerText = 'X';
        closeBtn.onclick = function() {
            document.getElementById('iframeContainer').removeChild(iframeDiv);
        };
        closeBtn.ontouchend = function() {
            document.getElementById('iframeContainer').removeChild(iframeDiv);
        };
        header.appendChild(closeBtn);

        var minimizeBtn = document.createElement('button');
        minimizeBtn.className = 'minimizeBtn';
        minimizeBtn.classList.add('btn-info');
        minimizeBtn.innerText = '_'; // Küçültme butonu simgesi
        minimizeBtn.onclick = function() {
            if (iframeDiv.style.display === 'none') {
                iframeDiv.style.display = 'block';
                this.innerText = '_'; // Buton simgesini yeniden ayarla
                updateMinimizedWindows();
            } else {
                iframeDiv.style.display = 'none';
                minimizedWindows[iframeDiv.id] = iframeDiv;
                updateMinimizedWindows();
            }
        };
        header.appendChild(minimizeBtn);


        var iframe = document.createElement('iframe');
        iframe.src = url;
        iframe.width = '100%';
        iframe.height = '100%';
        iframeDiv.appendChild(iframe);
        iframeDiv.id = 'window-' + Date.now();
        iframeDiv.title = title;

        document.getElementById('iframeContainer').appendChild(iframeDiv);

        dragElement(iframeDiv, header);

        // Tıklanan pencerenin öne geçmesini sağla
        iframeDiv.onclick = function() {
            this.style.zIndex = ++highestZIndex;
        };
    }



    function dragElement(element, handle) {
        var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        var isDragging = false;

        handle.onmousedown = dragMouseDown;
        handle.ontouchstart = dragMouseDown; // Touch için başlangıç

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            if (e.type === 'touchstart') {
                pos3 = e.touches[0].clientX;
                pos4 = e.touches[0].clientY;
            } else {
                pos3 = e.clientX;
                pos4 = e.clientY;
            }
            isDragging = true;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
            document.ontouchend = closeDragElement; // Touch için bitiş
            document.ontouchmove = elementDrag; // Touch için hareket
        }

        function elementDrag(e) {
            if (!isDragging) return;
            e = e || window.event;
            e.preventDefault();
            if (e.type === 'touchmove') {
                pos1 = pos3 - e.touches[0].clientX;
                pos2 = pos4 - e.touches[0].clientY;
                pos3 = e.touches[0].clientX;
                pos4 = e.touches[0].clientY;
            } else {
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
            }
            element.style.top = (element.offsetTop - pos2) + "px";
            element.style.left = (element.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            isDragging = false;
            document.onmouseup = null;
            document.onmousemove = null;
            document.ontouchend = null;
            document.ontouchmove = null;
        }
    }
</script>


<script>
    function openIframeToParentPage(url, top, left, width, height,title="WMS") {

        var iframeDiv = document.createElement('div');
        iframeDiv.className = 'draggableIframe';


        // Ekran boyutlarına göre boyutları ayarla
        var isMobileOrTablet = window.innerWidth <= 768 || window.innerHeight <= 768; // Basit bir kontrol
        if (isMobileOrTablet) {
            width = window.innerWidth * 0.98;
            height = window.innerHeight * 0.98;
            top = (window.innerHeight - height) / 2;
            left = (window.innerWidth - width) / 2;
        }


        iframeDiv.style.top = top + 'px';
        iframeDiv.style.left = left + 'px';
        iframeDiv.style.width = width + 'px';
        iframeDiv.style.height = height + 'px';
        iframeDiv.style.zIndex = ++highestZIndex; // Z-index değerini ayarla

        var header = document.createElement('div');
        header.className = 'external_page-header';
        header.innerHTML = title;
        iframeDiv.appendChild(header);

        var closeBtn = document.createElement('button');
        closeBtn.className = 'external_page-closeBtn';
        closeBtn.innerText = 'X';
        closeBtn.onclick = function() {
            document.getElementById('iframeContainer').removeChild(iframeDiv);
        };
        closeBtn.ontouchend = function() {
            document.getElementById('iframeContainer').removeChild(iframeDiv);
        };
        header.appendChild(closeBtn);

        var iframe = document.createElement('iframe');
        iframe.src = url;
        iframe.width = '100%';
        iframe.height = '100%';
        iframeDiv.appendChild(iframe);

        window.parent.document.getElementById('iframeContainer').appendChild(iframeDiv);

        dragElementFromParent(iframeDiv, header);

        // Tıklanan pencerenin öne geçmesini sağla
        iframeDiv.onclick = function() {
            this.style.zIndex = ++highestZIndex;
        };
    }

    function dragElementFromParent(element, handle) {
        var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        var isDragging = false;

        handle.onmousedown = dragMouseDown;
        handle.ontouchstart = dragMouseDown; // Touch için başlangıç

        function dragMouseDown(e) {
            e = e || window.parent.event;
            e.preventDefault();
            if (e.type === 'touchstart') {
                pos3 = e.touches[0].clientX;
                pos4 = e.touches[0].clientY;
            } else {
                pos3 = e.clientX;
                pos4 = e.clientY;
            }
            isDragging = true;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
            document.ontouchend = closeDragElement; // Touch için bitiş
            document.ontouchmove = elementDrag; // Touch için hareket
        }

        function elementDrag(e) {
            if (!isDragging) return;
            e = e || window.parent.event;
            e.preventDefault();
            if (e.type === 'touchmove') {
                pos1 = pos3 - e.touches[0].clientX;
                pos2 = pos4 - e.touches[0].clientY;
                pos3 = e.touches[0].clientX;
                pos4 = e.touches[0].clientY;
            } else {
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
            }
            element.style.top = (element.offsetTop - pos2) + "px";
            element.style.left = (element.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            isDragging = false;
            document.onmouseup = null;
            document.onmousemove = null;
            document.ontouchend = null;
            document.ontouchmove = null;
        }
    }
</script>
