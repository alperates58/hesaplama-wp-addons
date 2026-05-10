function hcKopekVkiHesapla() {
    const waist = parseInt(document.getElementById('hc-kov-waist').value);
    
    const resStatus = document.getElementById('hc-kov-res-status');
    const resInfo = document.getElementById('hc-kov-res-info');

    let status = "";
    let info = "";
    let color = "";

    switch(waist) {
        case 1:
            status = "Zayıf / Çok Zayıf";
            info = "Köpeğinizin kilosu normalin altında görünüyor. Veteriner hekime danışmanız önerilir.";
            color = "#3498db";
            break;
        case 3:
            status = "İdeal Kilo";
            info = "Köpeğiniz sağlıklı bir kondisyona sahip.";
            color = "#27ae60";
            break;
        case 5:
            status = "Fazla Kilolu";
            info = "Köpeğinizde yağlanma başlamış. Egzersiz ve diyet gözden geçirilmelidir.";
            color = "#f1c40f";
            break;
        case 7:
            status = "Obez";
            info = "Köpeğiniz ciddi kilo problemi yaşıyor. Veteriner kontrolünde diyet gereklidir.";
            color = "#e74c3c";
            break;
    }

    resStatus.innerText = status;
    resStatus.style.color = color;
    resInfo.innerText = info;

    document.getElementById('hc-kopek-vki-result').classList.add('visible');
}
