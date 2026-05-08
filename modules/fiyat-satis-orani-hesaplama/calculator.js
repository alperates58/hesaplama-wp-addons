function hcPSHesapla() {
    const mcap = parseFloat(document.getElementById('hc-ps-mcap').value) || 0;
    const revenue = parseFloat(document.getElementById('hc-ps-revenue').value) || 0;

    if (revenue === 0) {
        alert('Satış tutarı sıfır olamaz.');
        return;
    }

    const ps = mcap / revenue;

    document.getElementById('hc-ps-res-val').innerText = ps.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-ps-ratio-result').classList.add('visible');
}
