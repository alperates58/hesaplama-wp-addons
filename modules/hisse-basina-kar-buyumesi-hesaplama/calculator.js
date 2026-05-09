function hcEPSGrowthHesapla() {
    const current = parseFloat(document.getElementById('hc-eg-current').value) || 0;
    const previous = parseFloat(document.getElementById('hc-eg-previous').value) || 0;

    if (previous === 0) {
        alert('Önceki dönem EPS sıfır olamaz.');
        return;
    }

    const growth = ((current - previous) / previous) * 100;

    document.getElementById('hc-eg-res-val').innerText = '%' + growth.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-eps-growth-result').classList.add('visible');
}
