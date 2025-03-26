form_ajax_update_url = null
csrf_token = null
function set_form_update_url_and_token(url,token){
    form_ajax_update_url = url
    csrf_token = token
}

function populateChildSelectFromParentParameter(object, target_id, selected) {
    return new Promise((resolve, reject) => {
        console.log("in func:" + object.value);
        var SendingData = {
            _token: csrf_token,
            data: object.value,
            target: target_id,
        }

        try {
            SendingData['stock_id'] =  document.getElementById('stock_id-1').value
        }catch (error){
            console.log(error)
        }

        console.log(SendingData)

        $.ajax({
            type: 'POST',
            url: form_ajax_update_url,
            data: SendingData,
            success: function (locationData) {
                console.log(locationData);
                console.log("target: "+ target_id);
                addOptionOnSelectElement(target_id, locationData, true, 1, selected).then(function() {
                    resolve();
                })
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}
