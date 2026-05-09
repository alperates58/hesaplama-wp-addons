function hcKEHesapla() {
    const x1 = parseFloat(document.getElementById('hc-ke-x1').value);
    const y1 = parseFloat(document.getElementById('hc-ke-y1').value);
    const x2 = parseFloat(document.getElementById('hc-ke-x2').value);
    const y2 = parseFloat(document.getElementById('hc-ke-y2').value);
    const ySample = parseFloat(document.getElementById('hc-ke-y').value);

    if (isNaN(x1) || isNaN(y1) || isNaN(x2) || isNaN(y2) || isNaN(ySample)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (x1 === x2) {
        alert('Standart derişimleri farklı olmalıdır.');
        return;
    }

    // m = (y2 - y1) / (x2 - x1)
    const m = (y2 - y1) / (x2 - x1);
    // b = y1 - m * x1
    const b = y1 - m * x1;

    // x = (y - b) / m
    const xSample = (ySample - b) / m;

    document.getElementById('hc-ke-val').innerText = xSample.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-ke-result').classList.add('visible');
}
