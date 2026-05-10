function hcKoiBoiHesapla() {
    const koi = parseFloat(document.getElementById('hc-cb-koi').value);
    const boi = parseFloat(document.getElementById('hc-cb-boi').value);

    if (!koi || !boi) {
        alert('Lütfen KOİ ve BOİ değerlerini giriniz.');
        return;
    }

    const ratio = koi / boi;
    const resVal = document.getElementById('hc-cb-res-val');
    const resDesc = document.getElementById('hc-cb-res-desc');

    resVal.innerText = ratio.toFixed(2).toLocaleString('tr-TR');

    if (ratio < 2) {
        resDesc.innerText = "Kolayca biyolojik olarak parçalanabilir atık su.";
        resDesc.style.color = "#27ae60";
    } else if (ratio <= 4) {
        resDesc.innerText = "Orta derecede parçalanabilir.";
        resDesc.style.color = "#f1c40f";
    } else {
        resDesc.innerText = "Zor parçalanan, kimyasal işlem gerektirebilecek atık su.";
        resDesc.style.color = "#e74c3c";
    }

    document.getElementById('hc-cod-bod-result').classList.add('visible');
}
