function hcOksijenasyonIndeksiHesapla() {
    const fio2 = parseFloat(document.getElementById('hc-oi-fio2').value);
    const map = parseFloat(document.getElementById('hc-oi-map').value);
    const pao2 = parseFloat(document.getElementById('hc-oi-pao2').value);

    if (isNaN(fio2) || isNaN(map) || isNaN(pao2) || pao2 === 0) {
        alert('Lütfen geçerli tüm değerleri giriniz.');
        return;
    }

    const oi = (fio2 * map) / pao2;
    const resVal = document.getElementById('hc-oi-res-val');
    const resDesc = document.getElementById('hc-oi-res-desc');

    resVal.innerText = oi.toFixed(2).toLocaleString('tr-TR');

    if (oi < 5) {
        resDesc.innerText = 'Düşük Risk / Normal';
        resDesc.style.color = '#27ae60';
    } else if (oi < 15) {
        resDesc.innerText = 'Hafif Hipoksemi';
        resDesc.style.color = '#f39c12';
    } else if (oi < 25) {
        resDesc.innerText = 'Orta Derecede Hipoksemi';
        resDesc.style.color = '#e67e22';
    } else {
        resDesc.innerText = 'Şiddetli Hipoksemi (ARDS riski yüksek)';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-oksijenasyon-indeksi-result').classList.add('visible');
}
