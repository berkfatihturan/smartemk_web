function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function scrollToElement(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({ behavior: "smooth" });
    }
}

function open_for_me(url,title){
    openIframe(url, 50, 1300, 600, 900,title)
}

function openBox(item_id) {
    var box = document.getElementById(item_id)
    if (box.style.display === "") {
        box.style.display = "none";
    } else {
        box.style.display = "";
    }
}

function openBoxBlock(item_id) {
    var box = document.getElementById(item_id)
    if (box.style.display === "block") {
        box.style.display = "none";
    } else {
        box.style.display = "block";
    }
}

function openBoxF(display, item_id) {
    var box = document.getElementById(item_id)
    if (box.style.display === display) {
        box.style.display = "none";
    } else {
        box.style.display = display;
    }
}

function btn_download(href,type=1) {
    var min = document.querySelector("#download-card .min_input").value.toString();
    var max = document.querySelector("#download-card .max_input").value.toString();
    console.log(min)
    if (min === ""){
        min="1880-01-01T15:44"
    }
    if(max ===""){
        max="3880-01-01T15:44"
    }

    href = href.replace(":min", min);
    href = href.replace(":max", max);
    console.log(href)
    if (type===0){
        sendAjaxRequest(href)
    }else if(type === 2){
        openIframe(href, 100, 100, 500, 900,'Export')
    }
    else{
        window.open(href)
    }
}

function sendAjaxRequest(url) {
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json' // Gerekirse başlık ayarlayın
        },
        // Eğer bir gövde verisi gönderecekseniz buraya ekleyin
        // body: JSON.stringify({ yourData: 'value' })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error("Ağ isteği hatası: " + response.status);
            }
            return response.json(); // Yanıtı JSON formatında al
        })
        .then(data => {
            console.log(data.message); // 'Excel export işlemi kuyruğa alındı.' mesajını göster
            showToast(data.message)
        })
        .catch(error => {
            console.error("Hata: ", error); // Hataları yakala
        });
}

function showToast(message) {
    // Mesaj kutusunu oluştur
    const toast = document.createElement('div');
    toast.textContent = message;
    toast.style.position = 'fixed';
    toast.style.top = '70px';
    toast.style.right = '20px';
    toast.style.backgroundColor = '#4CAF50'; // Yeşil arka plan
    toast.style.color = 'white'; // Beyaz metin
    toast.style.padding = '15px';
    toast.style.borderRadius = '5px';
    toast.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
    toast.style.opacity = '0'; // Başlangıçta görünmez
    toast.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    toast.style.transform = 'translateY(-10px)'; // Yukarı kaydırma
    toast.style.zIndex = '999';
    document.body.appendChild(toast); // Mesaj kutusunu ekle

    // Göster ve animasyonu başlat
    requestAnimationFrame(() => {
        toast.style.opacity = '1'; // Gösterildiğinde görünür
        toast.style.transform = 'translateY(0)'; // Yükseklik kaybını gider
    });

    // Mesaj kutusunu 3 saniye sonra gizle
    setTimeout(() => {
        toast.style.opacity = '0'; // Gizle
        setTimeout(() => {
            document.body.removeChild(toast); // DOM'dan kaldır
        }, 500); // CSS geçiş süresi
    }, 3000); // 3 saniye bekle
}


function addOptionOnSelectElement(form_item_id, data_list, clear_list, clr_start_point, selected) {
    return new Promise((resolve, reject) => {
        selectElement = document.getElementById(form_item_id)
        if (clear_list) {
            while (selectElement.children[clr_start_point]) {
                selectElement.removeChild(selectElement.lastChild);
            }
        }
        data_list.forEach(function (item) {
            var option = document.createElement("option");
            option.text = item.name;
            option.value = item.id;
            selectElement.appendChild(option);
        });


        Array.from(selectElement.children).forEach(child => {
            if (selected === child.value) {
                selectElement.value = child.value;
            }
        })

        resolve();
    });

}

function submitForm() {

    var requiredInputs = document.getElementsByClassName("required_input");
    var activeSubmit = true;
    Array.from(requiredInputs).forEach(function (element) {
        if (element.value === "") {
            activeSubmit = false;
        }
    });

    if (activeSubmit) {
        document.getElementById("main-form").submit();
    } else {
        alert("Please Fill All Required Inputs")
    }
}

function dateFormatToLaravel(date){
    var setCreatedTime = new Date(date)
    setCreatedTime.setHours(setCreatedTime.getHours() + 3)
    setCreatedTime =setCreatedTime.toISOString().replace(/T/, ' ').replace(/\..+/, '');
    return setCreatedTime;
}

function gotoLaravelLink(link,attribute,new_tab=false){
    var url =link.replace(':id',attribute)

    if (new_tab){
        return !window.open(url,'','width=1000,height=800')
    }else{
        return 1;
    }
}

function goToExternalPage(link, attribute, title){
    var url =link.replace(':id',attribute)
    openIframe(url, 100, 100, 1000, 800,title)
}

function shakeElement(el) {
    const wiggletime = 80;
    el.classList.add('rotateable');
    el.style.marginLeft = '10px';

    setTimeout(function() {
        el.style.marginLeft = '-10px';
        setTimeout(function() {
            el.style.marginLeft = '5px';
            setTimeout(function() {
                el.style.marginLeft = '-5px';
                setTimeout(function() {
                    el.style.marginLeft = '0px';
                }, wiggletime);
            }, wiggletime);
        }, wiggletime);
    }, wiggletime);

    return true;
}
