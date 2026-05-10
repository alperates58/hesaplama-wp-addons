function hcAhiHesapla() {
    const events = parseFloat(document.getElementById('hc-ahi-events').value);
    const hours = parseFloat(document.getElementById('hc-ahi-hours').value);

    if (isNaN(events) || isNaN(hours) || hours === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const ahi = events / hours;
    const resVal = document.getElementById('hc-ahi-res-val');
    const resDesc = document.getElementById('hc-ahi-res-desc');

    resVal.innerText = ahi.toFixed(1).toLocaleString('tr-TR');

    if (ahi < 5) {
        resDesc.innerText = 'Normal';
        resDesc.style.color = '#27ae60';
    } else if (ahi < 15) {
        resDesc.innerText = 'Hafif Uyku Apnesi';
        resDesc.style.color = '#f1c40f';
    } else if (ahi < 30) {
        resDesc.innerText = 'Orta Derecede Uyku Apnesi';
        resDesc.style.color = '#e67e22';
    } else {
        resDesc.innerText = 'Ağır (Şiddetli) Uyku Apnesi';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-ahi-result').classList.add('visible');
}
