function hcMetMinHesapla() {
    const met = parseFloat(document.getElementById('hc-met-intensity').value);
    const duration = parseInt(document.getElementById('hc-met-duration').value);
    const days = parseInt(document.getElementById('hc-met-days').value);

    if (!duration || !days) {
        alert('Lütfen süre ve gün bilgilerini giriniz.');
        return;
    }

    const totalMetMin = met * duration * days;
    
    const resVal = document.getElementById('hc-met-res-val');
    resVal.innerText = totalMetMin.toLocaleString('tr-TR');

    const resDesc = document.getElementById('hc-met-res-desc');
    if (totalMetMin < 600) {
        resDesc.innerText = "Düşük aktivite seviyesi. Sağlık için haftalık en az 600 MET-dakika önerilir.";
        resDesc.style.color = "#e74c3c";
    } else if (totalMetMin <= 3000) {
        resDesc.innerText = "Yeterli aktivite seviyesi. Dünya Sağlık Örgütü standartlarına uygundur.";
        resDesc.style.color = "#27ae60";
    } else {
        resDesc.innerText = "Yüksek aktivite seviyesi. Kondisyon seviyeniz oldukça iyi.";
        resDesc.style.color = "#2980b9";
    }

    document.getElementById('hc-met-min-result').classList.add('visible');
}
