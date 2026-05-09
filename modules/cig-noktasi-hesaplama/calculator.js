function hcCNHesapla() {
    const t = parseFloat(document.getElementById('hc-cn-temp').value);
    const rh = parseFloat(document.getElementById('hc-cn-hum').value);

    if (isNaN(t) || isNaN(rh) || rh <= 0 || rh > 100) {
        alert('Lütfen geçerli değerler giriniz (Nem %1-100 arası).');
        return;
    }

    const a = 17.27;
    const b = 237.7;
    
    const alpha = ((a * t) / (b + t)) + Math.log(rh / 100);
    const td = (b * alpha) / (a - alpha);

    document.getElementById('hc-cn-val').innerText = td.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' °C';
    document.getElementById('hc-cn-result').classList.add('visible');
}
