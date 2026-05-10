function hcDistanceHesapla() {
    const x1 = parseFloat(document.getElementById('hc-ds-x1').value);
    const y1 = parseFloat(document.getElementById('hc-ds-y1').value);
    const x2 = parseFloat(document.getElementById('hc-ds-x2').value);
    const y2 = parseFloat(document.getElementById('hc-ds-y2').value);

    if (isNaN(x1) || isNaN(y1) || isNaN(x2) || isNaN(y2)) {
        alert('Lütfen tüm koordinatları giriniz.');
        return;
    }

    const distance = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));

    document.getElementById('hc-ds-res-val').innerText = distance.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-distance-result').classList.add('visible');
}
