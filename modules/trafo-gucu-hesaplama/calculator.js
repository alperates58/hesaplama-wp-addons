function hcTransformerPowerHesapla() {
    const factor = parseFloat(document.getElementById('hc-tp-type').value);
    const v = parseFloat(document.getElementById('hc-tp-v').value) || 0;
    const i = parseFloat(document.getElementById('hc-tp-i').value) || 0;

    const va = factor * v * i;
    const kva = va / 1000;

    document.getElementById('hc-res-tp-val').innerText = kva.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kVA';
    document.getElementById('hc-transformer-power-result').classList.add('visible');
}
