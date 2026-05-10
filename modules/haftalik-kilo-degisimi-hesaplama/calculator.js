function hcWeeklyWeightHesapla() {
    const last = parseFloat(document.getElementById('hc-ww-last').value);
    const curr = parseFloat(document.getElementById('hc-ww-this').value);

    if (!last || !curr) return;

    const diff = curr - last;
    const resVal = document.getElementById('hc-ww-res-val');
    const resDesc = document.getElementById('hc-ww-res-desc');

    resVal.innerText = (diff > 0 ? '+' : '') + diff.toFixed(1).toLocaleString('tr-TR');

    if (diff < -1) {
        resDesc.innerText = 'Çok Hızlı Kayıp (Kas kaybı riski olabilir)';
        resDesc.style.color = '#e67e22';
    } else if (diff < 0) {
        resDesc.innerText = 'Sağlıklı Kilo Kaybı';
        resDesc.style.color = '#27ae60';
    } else if (diff === 0) {
        resDesc.innerText = 'Kilo Sabit';
        resDesc.style.color = '#7f8c8d';
    } else if (diff <= 0.5) {
        resDesc.innerText = 'Hafif Artış / Kas Gelişimi';
        resDesc.style.color = '#2980b9';
    } else {
        resDesc.innerText = 'Kilo Alımı';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-weekly-weight-result').classList.add('visible');
}
