<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosya İçeriği</title>
    <!-- ViewerJS kütüphanesini ekleyin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.7.0/viewer.min.css">

</head>
<body>
<div id="viewer">
    <iframe src="{{\Illuminate\Support\Facades\Storage::url($file->file)}}" style="width: 100vw; height: 100vh"></iframe>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.7.0/viewer.min.js"></script>
<script>
    // ViewerJS'yi başlatın
    var viewer = new Viewer(document.getElementById('viewer'));
</script>
</body>
</html>
