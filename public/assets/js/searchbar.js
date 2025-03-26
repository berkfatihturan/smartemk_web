let isProcessing = false;
function search(input, keyClassName, keyClassList) {

    if (isProcessing) return;
    isProcessing = true

    filter = input.value.toUpperCase();
    table = $("#table .table-item").filter(function () {
        return !$(this).hasClass("ignore");
    });
    console.log('findfromme:'+filter)

    table.each(function (index) {
        var table_item = $(this).find("." + keyClassName);

        var item_value = table_item.text();
        var search_value = item_value.split("[")[0].toUpperCase();

        var ind = search_value.indexOf(filter);

        var item_id = "";
        if (ind > -1) {
            try {
                item_id = item_value.split("[")[1].split("]")[0];
                /*
                table_item.html(
                    item_value.substring(0, ind) +
                    "<span class='highlight'>" + item_value.substring(ind, ind + filter.length) + "</span>"
                    + item_value.substring(ind + filter.length, item_value.indexOf("[") - 1) +
                    "<small>[" + item_id + "]</small>"
                );
                */

            } catch (err) {
                table_item.html(
                    item_value.substring(0, ind) +
                    "<span class='highlight'>" + item_value.substring(ind, ind + filter.length) + "</span>"
                    + item_value.substring(ind + filter.length)
                );
            }
            $(this).removeClass("s-" + keyClassName);
        } else {
            $(this).addClass("s-" + keyClassName);
        }

        isProcessing = false
    })

    table.each(function (index) {
        var table_item = $(this);
        var display = "";

        $.each(keyClassList, function (index, value) {
            if (table_item.hasClass("s-" + value)) {
                display = "none";
            }
        });

        if (display === "none") {
            table_item.addClass("not_select")
        } else {
            table_item.removeClass("not_select")
        }

        table_item.css("display", display)
    })
}

function arrayDiff(a, b) {
    let difference = [];
    for (let i = 0; i < a.length; i++) {
        if (b.indexOf(a[i]) === -1) {
            difference.push(a[i]);
        }
    }
    return difference;
};

function select_by(checkbox, keyClassName, checkboxClassName, keyClassList) {
    var checkbox_value, table;

    var search_atr = {};

    table = $("#table .table-item").filter(function () {
        return !$(this).hasClass("not_select");
    });

    table.css("display", "");
    table.removeClass("ignore");

    $.each(keyClassList, function (index, value) {
        $('.stickyVerticalFilter__item .' + value).each(function () {
            var checked_list = []
            $(this).children("li").children("input:checked").each(function () {
                checked_list.push($(this).val().toUpperCase())
            })
            search_atr[value] = checked_list;
        });
    });



    table.each(function () {
        var table_item = $(this)
        $.each(search_atr, function (class_key, atr_items) {
            var at_least_one = false;
            $.each(atr_items, function (index, value) {
                var item_value = table_item.find("." + class_key).text().split('[')[0].trim(" ").toUpperCase();

                if (item_value === value) {
                    at_least_one = true;
                }
            });

            if (atr_items.length === 0) {
                at_least_one = true
            }

            if (!at_least_one) {
                table_item.css("display", "none");
                table_item.addClass("ignore")
            }
        });

    });

    setCurrentPage(1);
}

function sortBy(route_index, route_url) {
    var select = document.getElementById("topic_select").value;
    var checkbox = document.getElementById("isDesc").checked;
    var url = "";
    if (select === 'index' && checkbox === 'false') {
        url = route_index;
    } else {
        url = route_url;
        url = url.replace(":value", select).replace(':checkbox', checkbox)
    }
    window.location.href = url;
}

function sortByV2(route_index, route_url) {
    var select = document.getElementById("topic_select").value;
    var checkbox = document.getElementById("isDesc").checked;
    var url = "";
    if (select === 'index' && checkbox === 'false') {
        url = route_index;
    } else {
        url = route_url;
        url = url.replace(":value", select).replace(':checkbox', checkbox)
    }
    window.location.href = url;
}
