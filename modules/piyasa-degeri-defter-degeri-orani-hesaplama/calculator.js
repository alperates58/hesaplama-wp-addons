function hcPBHesapla() {
    const mcap = parseFloat(document.getElementById('hc-pb-mcap').value) || 0;
    const equity = parseFloat(document.getElementById('hc-pb-equity').value) || 0;

    if (equity === 0) {
        alert('Özsermaye sıfır olamaz.');
        return;
    }

    const pb = mcap / equity;

    document.getElementById('hc-pb-res-val').innerText = pb.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-pb-ratio-result').classList.add('visible');
}
