/* when a */
list_buttons = document.getElementsByClassName("list-button")
iframe_url = null;

function setIframeUrl(url) {
    iframe_url = url;
}

Array.prototype.forEach.call(list_buttons, function (list_item) {
    list_item.addEventListener("click", () => attachListButtonListeners(list_item));
});

function attachListButtonListeners(list_item) {

    var url = iframe_url;

    var parent_list_id = list_item.getAttribute('parent_item').split('-')[0];
    var table_name = list_item.getAttribute('table_name');
    var iframe_box = document.getElementById("iframe_box");
    var mainPage = document.getElementById("main-form");
    var iframe = document.getElementById("iframe")
    var url_id = "none";

    if (parent_list_id !== "none") {
        try {
            var stk_id = document.getElementById('stock_id-1').value
            url = url.replace(":stock_id", stk_id);
        } catch (error) {
            console.log(error)
        }

        var parent_list_item = document.getElementById(list_item.getAttribute('parent_item'));
        url_id = parent_list_item.value


        if (parent_list_item.value === "") {
            alert("Please Fill " + parent_list_id + " Properly")
            return null;
        }
    }


    url = url.replace(":id", url_id);
    url = url.replace(":table_name", table_name)
    if (list_item.getAttribute("multi_item_id")) {
        var table_id = list_item.getAttribute('multi_item_id')
        console.log(table_id)
        url = url.replace(":multi_item_id", table_id)
    }
    console.log("hiii")
    console.log(list_item.getAttribute('multi_item_id'))
    console.log("hiii2")
    iframe.src = url
    iframe_box.style.display = "flex";
    mainPage.style.filter = "blur(8px)";

    iframe.addEventListener("load", function () {
        iframe.style.filter = "none"; // Blur efektini kaldır
    });

}


function assignDoubleClickAction(target_id) {
    var tableItems = document.querySelectorAll('.table-item');
    tableItems.forEach(function (item) {
        item.ondblclick = function () {
            sendToMain(this, target_id);
        };
    });
}


function setSelectedValue(selectedValue, select_id, selectedName) {

    var selectElement = document.getElementById(select_id);
    var optionElements = selectElement.options;
    var is_success = false;
    for (var i = 0; i < optionElements.length; i++) {
        if (optionElements[i].value === selectedValue) {
            optionElements[i].selected = true;
            is_success = true;
            break;
        }
    }

    if (is_success === false) {
        newOption = document.createElement('option');
        newOption.value = selectedValue;
        newOption.innerHTML = selectedName.replace("New ", "");
        newOption.selected = true
        selectElement.appendChild(newOption);
    }

    try {
        selectElement.onchange();
    } catch (error) {
        console.error(error);
    }
    console.log(selectedValue);
}

// Seçim işlemi
function sendToMain(object, target_id) {
    var selectedValue = object.id;
    window.parent.console.log(selectedValue)
    var selectedName = object.querySelector('.value_name').innerHTML;
    window.parent.setSelectedValue(selectedValue, target_id, selectedName); // Ana sekmede seçilen değeri ayarla
    window.parent.document.getElementById("iframe_box").style.display = "none"; // Sekmeyi kapat
    window.parent.document.getElementById("main-form").style.filter = "";
}


