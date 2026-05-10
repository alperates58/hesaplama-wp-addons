function hcMidpointHesapla() {
    const x1 = parseFloat(document.getElementById('hc-m-x1').value);
    const y1 = parseFloat(document.getElementById('hc-m-y1').value);
    const x2 = parseFloat(document.getElementById('hc-m-x2').value);
    const y2 = parseFloat(document.getElementById('hc-m-y2').value);

    if (isNaN(x1) || isNaN(y1) || isNaN(x2) || isNaN(y2)) {
        alert('Lütfen tüm koordinatları giriniz.');
        return;
    }

    const mx = (x1 + x2) / 2;
    const my = (y1 + y2) / 2;

    document.getElementById('hc-m-res-val').innerText = `(${mx.toLocaleString('tr-TR')}, ${my.toLocaleString('tr-TR')})`;
    document.getElementById('hc-midpoint-result').classList.add('visible');
}
