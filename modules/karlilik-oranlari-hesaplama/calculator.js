function hcKarlilikHesapla() {
    const revenue = parseFloat(document.getElementById('hc-pr-revenue').value) || 0;
    const gross = parseFloat(document.getElementById('hc-pr-gross').value) || 0;
    const ebit = parseFloat(document.getElementById('hc-pr-ebit').value) || 0;
    const net = parseFloat(document.getElementById('hc-pr-net').value) || 0;

    if (revenue === 0) {
        alert('Satış tutarı sıfır olamaz.');
        return;
    }

    const gpm = (gross / revenue) * 100;
    const opm = (ebit / revenue) * 100;
    const npm = (net / revenue) * 100;

    document.getElementById('hc-pr-res-gross').innerText = '%' + gpm.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-pr-res-ebit').innerText = '%' + opm.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-pr-res-net').innerText = '%' + npm.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    document.getElementById('hc-prof-ratios-result').classList.add('visible');
}
