function hcGoogleAdsMaliyetHesapla() {
    const clicks = parseFloat(document.getElementById('hc-gam-clicks').value);
    const cpc = parseFloat(document.getElementById('hc-gam-cpc').value);
    const taxFactor = parseFloat(document.getElementById('hc-gam-tax').value);

    if (isNaN(clicks) || isNaN(cpc) || clicks <= 0 || cpc <= 0) {
        alert('Lütfen geçerli tıklama sayısı ve CPC girin.');
        return;
    }

    const netCost = clicks * cpc;
    const totalCost = netCost * taxFactor;

    document.getElementById('hc-gam-res-net').innerText = netCost.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gam-res-total').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gam-result').classList.add('visible');
}
