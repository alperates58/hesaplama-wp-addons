function hcBNHesapla() {
    const t = parseFloat(document.getElementById('hc-bn-temp').value);
    const td = parseFloat(document.getElementById('hc-bn-dew').value);

    if (isNaN(t) || isNaN(td)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (td > t) {
        alert('Çiğ noktası hava sıcaklığından yüksek olamaz.');
        return;
    }

    // RH = 100 * (EXP((17.625 * TD) / (243.04 + TD)) / EXP((17.625 * T) / (243.04 + T)))
    const rh = 100 * (Math.exp((17.625 * td) / (243.04 + td)) / Math.exp((17.625 * t) / (243.04 + t)));

    document.getElementById('hc-bn-val').innerText = '%' + Math.round(rh);
    document.getElementById('hc-bn-result').classList.add('visible');
}
