function hcFaaliyetHesapla() {
    const revenue = parseFloat(document.getElementById('hc-ac-revenue').value) || 0;
    const cogs = parseFloat(document.getElementById('hc-ac-cogs').value) || 0;
    const inventory = parseFloat(document.getElementById('hc-ac-inventory').value) || 0;
    const assets = parseFloat(document.getElementById('hc-ac-assets').value) || 0;

    const stokTurnover = inventory > 0 ? cogs / inventory : 0;
    const assetTurnover = assets > 0 ? revenue / assets : 0;

    document.getElementById('hc-ac-res-stok').innerText = stokTurnover > 0 ? stokTurnover.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' Kat' : "-";
    document.getElementById('hc-ac-res-assets').innerText = assetTurnover > 0 ? assetTurnover.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' Kat' : "-";

    document.getElementById('hc-activity-result').classList.add('visible');
}
