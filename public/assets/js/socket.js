function start_connection(api_server_address) {
    var socket = new SockJS(api_server_address);
    return Stomp.over(socket);
}


function sendDeleteRequest(url) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.send();
}

function sendUploadRequest(url,csrf_token) {

    var formData = new FormData();
    var files = $('#operationsFiles')[0].files;

    // Dosyaları FormData'ya ekle
    for(var i = 0; i < files.length; i++) {
        formData.append('operationsFiles[]', files[i]);
    }

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        url: url, // Yükleme route'unuzu buraya yazın
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });


}

