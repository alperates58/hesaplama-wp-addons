function hcHeatLossHesapla() {
    const area = parseFloat(document.getElementById('hc-hl-area').value);
    const height = parseFloat(document.getElementById('hc-hl-height').value);
    const factor = parseFloat(document.getElementById('hc-hl-ins').value);

    if (!area || !height) {
        alert('Lütfen ölçüleri giriniz.');
        return;
    }

    const volume = area * height;
    const loss = volume * factor;

    document.getElementById('hc-hl-res-val').innerText = Math.round(loss).toLocaleString('tr-TR');
    
    // 600mm height standard panel radiator approx 1800W per meter
    const radMeter = loss / 1800;
    document.getElementById('hc-hl-res-rad').innerText = `Önerilen Radyatör Boyu: ${radMeter.toFixed(1)} Metre`;

    document.getElementById('hc-heat-loss-result').classList.add('visible');
}
