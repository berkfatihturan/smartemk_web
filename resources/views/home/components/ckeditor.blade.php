<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html {
            transform-origin: top left;
            transition: transform 0.2s ease-in-out; /* Yumuşak geçiş */
            overflow: hidden;
            display: flex;
        }
    </style>
</head>
<body>

<div class="content">
    {!! $content !!}
</div>

<script>
    let baseWidth = document.documentElement.scrollWidth;
    function setZoomAndSendHeight(event) {
        if (event.data.width) {
            let parentWidth = event.data.width; // Parent sayfadan gelen genişlik


            let zoomValue = parentWidth / baseWidth; // Zoom oranını hesapla
            document.documentElement.style.transform = `scale(${zoomValue})`;

            // Yeni `.content` yüksekliğini ölç
            let contentHeight = document.querySelector(".content").scrollHeight;
            let newHeight = contentHeight * zoomValue; // Zoom oranına göre yeni yükseklik hesapla

            // Parent sayfaya yeni yükseklik bilgisini gönder
            window.parent.postMessage({ height: newHeight }, "*");
        }
    }

    // Parent sayfadan gelen mesajı dinle
    window.addEventListener("message", setZoomAndSendHeight);

    // Sayfa yüklendiğinde mevcut yüksekliği parent'a gönder
    window.addEventListener("load", function () {
        let contentHeight = document.querySelector(".content").scrollHeight;
        window.parent.postMessage({ height: contentHeight }, "*");
    });
</script>

</body>
</html>
