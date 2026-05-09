function hcEfficiencyHesapla() {
    const output = parseFloat(document.getElementById('hc-ef-output').value) || 0;
    const input = parseFloat(document.getElementById('hc-ef-input').value) || 0;

    if (input === 0) return;

    const efficiency = (output / input) * 100;

    document.getElementById('hc-res-ef-val').innerText = '%' + efficiency.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-efficiency-result').classList.add('visible');
}
