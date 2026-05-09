function hcBDMHesapla() {
    const l = parseFloat(document.getElementById('hc-bdm-length').value);
    const w = parseFloat(document.getElementById('hc-bdm-width').value);
    const t = parseFloat(document.getElementById('hc-bdm-thick').value);
    const waste = parseFloat(document.getElementById('hc-bdm-waste').value) || 0;

    if (isNaN(l) || isNaN(w) || isNaN(t) || l <= 0 || w <= 0 || t <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const volume = l * w * (t / 100);
    const totalVolume = volume * (1 + waste / 100);

    document.getElementById('hc-bdm-val').innerText = totalVolume.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³';
    document.getElementById('hc-bdm-note').innerText = `Net hacim: ${volume.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} m³ + %${waste} fire.`;
    document.getElementById('hc-bdm-result').classList.add('visible');
}
