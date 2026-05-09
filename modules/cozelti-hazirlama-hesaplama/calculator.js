function hcCozeltiHazirlaHesapla() {
    const molarity = parseFloat(document.getElementById('hc-ch-molarity').value);
    const volumeMl = parseFloat(document.getElementById('hc-ch-volume').value);
    const mw = parseFloat(document.getElementById('hc-ch-mw').value);

    if (isNaN(molarity) || isNaN(volumeMl) || isNaN(mw)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const volumeL = volumeMl / 1000;
    const mass = molarity * volumeL * mw;

    document.getElementById('hc-ch-val').innerText = mass.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g';
    document.getElementById('hc-ch-result').classList.add('visible');
}
