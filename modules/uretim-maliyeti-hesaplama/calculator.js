function hcProductionCostHesapla() {
    const mat = parseFloat(document.getElementById('hc-pc-mat').value) || 0;
    const labor = parseFloat(document.getElementById('hc-pc-labor').value) || 0;
    const oh = parseFloat(document.getElementById('hc-pc-oh').value) || 0;
    const qty = parseInt(document.getElementById('hc-pc-qty').value) || 1;

    const total = (mat + labor + oh) * qty;
    const unit = total / qty;

    document.getElementById('hc-res-pc-unit').innerText = unit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-pc-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    
    document.getElementById('hc-production-cost-result').classList.add('visible');
}
