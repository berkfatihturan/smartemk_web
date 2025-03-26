/* COMPONENTS */
var detailButton = `<a onclick="openIframe(':link', 100, 100, 1000, 800,'Detail')" class="btn btn-block btn-primary"><i class="fas fa-search"></i></a>`;

var updateButton = `<a onclick="openIframe(':link', 100, 100, 1000, 800,'Update')"
                                       class="btn btn-block btn-info">
                                        <svg style="height: 18px; fill: white; position: relative;bottom:1px"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                        </svg>
                                    </a>`;

var deleteButton = `<a href=":link"
                                       onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"
                                       class="btn btn-block btn-danger">
                                        <svg style="height: 18px; fill: white; position: relative;bottom:1px"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                        </svg>
                                    </a>`;

var mini_delete_button = `<a onclick="sendDeleteRequest(':link')" href="#" style="border-radius: 3px; margin-left: 5px; background: red; padding: 0 6px; cursor: pointer" class="delete_button">
                                                <svg style="width: 13px;margin-bottom: 3px; fill: white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path>
                                                </svg>
                                            </a>`


/* _COMPONENTS_ */

/* BASE */
function insertNewItem(newItem, table_id, table_item_element, table_item_className, table_item_id, afterbegin, iframe_table_target_class) {
    // Tablonun referansını al
    var table = document.getElementById(table_id);
    // Yeni bir <tr> (satır) oluştur
    var newRow = document.createElement(table_item_element);
    newRow.className = table_item_className;
    newRow.id = table_item_id;
    newRow.style.background = "rgb(102,204,0,.2)";


    // Yeni satırın içeriğini oluştur
    // Yeni satırın içeriğini ata
    newRow.innerHTML = newItem;
    if (afterbegin) {
        // Tabloya yeni satırı ekle
        table.insertAdjacentElement('afterbegin', newRow);
    } else {
        // Tabloya yeni satırı ekle
        table.insertAdjacentElement('beforeend', newRow);
    }

}

function setButtonForBaseTable(link, key, buttonItem) {
    link = link.replace(":key", key)
    buttonItem = buttonItem.replace(":link", link)
    return buttonItem;
}

/* _BASE_ */

/* ---- */

function insertMiniTable(table_id, serverData, destroy_btn_link) {
    table = document.getElementById(table_id);
    var miniList = `<li id="` + serverData.id + `" style="display: flex; align-items: center; margin-bottom: 10px">
                                            <span class="btn btn-info px-1 py-0">` + serverData.data.file_name + `</span>` + setButtonForBaseTable(destroy_btn_link, serverData.id, mini_delete_button) + `</li>`
    table.insertAdjacentHTML('beforeend', miniList);
}

function insertNewItemStock_BaseTable(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {

    var tableItemContent = `<td>` + serverData.id + `</td>
            <td class="value_name"><span class="right badge badge-danger">New</span> ` + serverData.data.name + `</td>
            <td class="value_code">` + serverData.data.code + `</td>
            <td class="value_feature">` + serverData.data.feature + `</td>
            <td class="value_created_date">` + dateFormatToLaravel(serverData.data.production_date) + `</td>
            <td>
                ` + setButtonForBaseTable(show_btn_link, serverData.id, detailButton) + `
            </td>
            <td>
                ` + setButtonForBaseTable(edit_btn_link, serverData.id, updateButton) + `
            </td>
            <td>
                ` + setButtonForBaseTable(destroy_btn_link, serverData.id, deleteButton) + `
            </td>`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, false)

}

function insertNewItemOperation_BaseTable(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {

    function setAmountButton(data) {
        if (data < 0) {
            return `<span class="btn btn-danger" style="font-weight: bolder; letter-spacing: 1px">` + data + `</span>`
        } else {
            return `<span class="btn btn-success" style="font-weight: bolder; letter-spacing: 1px"> +` + data + `</span>`
        }
    }

    var setCreatedTime = new Date(serverData.data.created_at)
    setCreatedTime.setHours(setCreatedTime.getHours() + 3)
    setCreatedTime = setCreatedTime.toISOString().replace(/T/, ' ').replace(/\..+/, '');

    var tableItemContent = `
    <td><input type="checkbox" class="checkOperation checkbox-${serverData.id}"
               value="${serverData.id}" onchange="checkCheckboxes()"></td>
    <td>${serverData.id}</td>
    <td class="value_name">
        <span class="right badge badge-danger">New</span> ${serverData.data.stock.name}
    </td>
    <td class="value_warehouse">${serverData.data.boxes.location.warehouses.name}</td>
    <td class="value_location">${serverData.data.boxes.location.name}</td>
    <td class="value_box">${serverData.data.boxes.name}</td>
    <td class="value_type_name"
        style="color: ${serverData.data.have_parent === 1 ? 'blue' : 'orange'}; font-weight: 600;">
        ${serverData.data.have_parent === 1 ? 'Order' : 'Operation'}
    </td>
    <td class="value_amount">${setAmountButton(serverData.data.amount)}</td>
    <td>${setCreatedTime}</td>
    <td>
        ${setButtonForBaseTable(show_btn_link, serverData.id, detailButton)}
    </td>
    <td>
        ${setButtonForBaseTable(edit_btn_link, serverData.id, updateButton)}
    </td>
    <td>
        ${setButtonForBaseTable(destroy_btn_link, serverData.id, deleteButton)}
    </td>
`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, true);

}

function insertNewItemLocations_BaseTable(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {
    var setCreatedTime = new Date(serverData.data.created_at)
    setCreatedTime.setHours(setCreatedTime.getHours() + 3)
    setCreatedTime = setCreatedTime.toISOString().replace(/T/, ' ').replace(/\..+/, '');

    var tableItemContent = `<td>` + serverData.id + `</td>
            <td class="value_name"><span class="right badge badge-danger">New</span> ` + serverData.data.name + `</td>
            <td class="value_warehouse">` + serverData.data.warehouses.name + `</td>
            <td class="value_created_date">` + setCreatedTime + `</td>
            <td>
                ` + setButtonForBaseTable(show_btn_link, serverData.id, detailButton) + `
            </td>
            <td>
                ` + setButtonForBaseTable(edit_btn_link, serverData.id, updateButton) + `
            </td>
            <td>
                ` + setButtonForBaseTable(destroy_btn_link, serverData.id, deleteButton) + `
            </td>`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, true);

}


function insertNewItemBox_BaseTable(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {
    var setCreatedTime = new Date(serverData.data.created_at)
    setCreatedTime.setHours(setCreatedTime.getHours() + 3)
    setCreatedTime = setCreatedTime.toISOString().replace(/T/, ' ').replace(/\..+/, '');

    var tableItemContent = `<td>` + serverData.id + `</td>
            <td class="value_name"><span class="right badge badge-danger">New</span> ` + serverData.data.name + `</td>
            <td class="value_location">` + serverData.data.location.name + `</td>
            <td class="value_warehouse">` + serverData.data.location.warehouses.name + `</td>
            <td class="value_unit">` + serverData.data.unit.name + `</td>
            <td class="value_created_date">` + setCreatedTime + `</td>
            <td>
                ` + setButtonForBaseTable(show_btn_link, serverData.id, detailButton) + `
            </td>
            <td>
                ` + setButtonForBaseTable(edit_btn_link, serverData.id, updateButton) + `
            </td>
            <td>
                ` + setButtonForBaseTable(destroy_btn_link, serverData.id, deleteButton) + `
            </td>`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, true);
}

function insertNewItemBox_Iframe(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {

    var tableItemContent = `<td>` + serverData.id + `</td>
            <td class="value_name"><span class="right badge badge-danger">New</span> ` + serverData.data.name + `</td>
            <td class="value_warehouse">` + serverData.data.location.warehouses.name + `</td>
            <td class="value_location">` + serverData.data.location.name + `</td>
            <td class="value_unit">` + serverData.data.unit.name + `</td>
            <td>` + setButtonForBaseTable(show_btn_link, serverData.id, detailButton) + `</td>
            <td>` + setButtonForBaseTable(edit_btn_link, serverData.id, updateButton) + `</td>`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, true);
}

function insertNewItemLocation_Iframe(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {

    var tableItemContent = `<td>` + serverData.id + `</td>
            <td class="value_name"><span class="right badge badge-danger">New</span> ` + serverData.data.name + `</td>
            <td class="warehouse_name">` + serverData.data.warehouses.name + `</td>
            <td>` + setButtonForBaseTable(show_btn_link, serverData.id, detailButton) + `</td>
            <td>` + setButtonForBaseTable(edit_btn_link, serverData.id, updateButton) + `</td>`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, true, 'location_id');
}

function insertNewItemWarehouse_Iframe(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {

    var tableItemContent = `<td>` + serverData.id + `</td>
            <td class="value_name"><span class="right badge badge-danger">New</span> ` + serverData.data.name + `</td>
            <td class="address">` + serverData.data.address + `</td>
            <td class="phone">` + serverData.data.phone + `</td>
            <td class="email">` + serverData.data.email + `</td>
            <td>` + setButtonForBaseTable(show_btn_link, serverData.id, detailButton) + `</td>
            <td>` + setButtonForBaseTable(edit_btn_link, serverData.id, updateButton) + `</td>`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, true, 'warehouse_id');
}

function insertNewItemStock_Iframe(serverData, show_btn_link, edit_btn_link, destroy_btn_link) {

    var tableItemContent = `<td>` + serverData.id + `</td>
            <td class="value_name"><span class="right badge badge-danger">New</span> ` + serverData.data.name + `</td>
            <td class="code">` + serverData.data.code + `</td>
            <td class="feature">` + serverData.data.feature + `</td>
            <td class="production_date">` + dateFormatToLaravel(serverData.data.production_date) + `</td>
            <td>` + setButtonForBaseTable(show_btn_link, serverData.id, detailButton) + `</td>
            <td>` + setButtonForBaseTable(edit_btn_link, serverData.id, updateButton) + `</td>`;

    insertNewItem(tableItemContent, "table", "tr", "table-item", serverData.id, true);
}

/* _----_ */


