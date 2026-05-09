function hcSolarAlanHesapla() {
    const systemPowerKw = parseFloat(document.getElementById('hc-sa-power').value);
    const panelWatt = parseFloat(document.getElementById('hc-sa-panel-w').value);
    const panelArea = parseFloat(document.getElementById('hc-sa-panel-area').value);

    if (isNaN(systemPowerKw) || isNaN(panelWatt) || isNaN(panelArea)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const panelCount = Math.ceil((systemPowerKw * 1000) / panelWatt);
    const totalArea = panelCount * panelArea;

    document.getElementById('hc-res-sa-count').innerText = panelCount + ' Adet';
    document.getElementById('hc-res-sa-total').innerText = totalArea.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m²';

    document.getElementById('hc-sa-result').classList.add('visible');
}
