function hcPanelVerimiHesapla() {
    const power = parseFloat(document.getElementById('hc-sv-power').value);
    const width = parseFloat(document.getElementById('hc-sv-width').value);
    const height = parseFloat(document.getElementById('hc-sv-height').value);

    if (isNaN(power) || isNaN(width) || isNaN(height)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const areaM2 = (width / 100) * (height / 100);
    // Efficiency = (Power / (Area * 1000W/m2)) * 100
    const efficiency = (power / (areaM2 * 1000)) * 100;

    document.getElementById('hc-res-sv-area').innerText = areaM2.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m²';
    document.getElementById('hc-res-sv-percent').innerText = '%' + efficiency.toFixed(2);

    document.getElementById('hc-sv-result').classList.add('visible');
}
