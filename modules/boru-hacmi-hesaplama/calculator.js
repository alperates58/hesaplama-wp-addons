function hcBHHesapla() {
    const diam = parseFloat(document.getElementById('hc-bh-diam').value);
    const len = parseFloat(document.getElementById('hc-bh-len').value);

    if (isNaN(diam) || isNaN(len) || diam <= 0 || len <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const radius = diam / 2000; // m
    const volumeM3 = Math.PI * Math.pow(radius, 2) * len;
    const volumeLiters = volumeM3 * 1000;

    if (volumeLiters >= 1000) {
        document.getElementById('hc-bh-val').innerText = volumeM3.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m³';
    } else {
        document.getElementById('hc-bh-val').innerText = volumeLiters.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre';
    }

    document.getElementById('hc-bh-result').classList.add('visible');
}
