function hcDuPontHesapla() {
    const netProfit = parseFloat(document.getElementById('hc-da-net-profit').value) || 0;
    const revenue = parseFloat(document.getElementById('hc-da-revenue').value) || 0;
    const assets = parseFloat(document.getElementById('hc-da-assets').value) || 0;
    const equity = parseFloat(document.getElementById('hc-da-equity').value) || 0;

    if (revenue === 0 || assets === 0 || equity === 0) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const margin = netProfit / revenue;
    const turnover = revenue / assets;
    const leverage = assets / equity;
    const roe = margin * turnover * leverage;

    document.getElementById('hc-da-res-margin').innerText = '%' + (margin * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-da-res-turnover').innerText = turnover.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-da-res-leverage').innerText = leverage.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-da-res-roe').innerText = '%' + (roe * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    document.getElementById('hc-dupont-result').classList.add('visible');
}
