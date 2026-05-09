function hcPCFHesapla() {
    const mcap = parseFloat(document.getElementById('hc-pcf-mcap').value) || 0;
    const cf = parseFloat(document.getElementById('hc-pcf-cashflow').value) || 0;

    if (cf === 0) {
        alert('Nakit akışı sıfır olamaz.');
        return;
    }

    const pcf = mcap / cf;

    document.getElementById('hc-pcf-res-val').innerText = pcf.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-pcf-ratio-result').classList.add('visible');
}
