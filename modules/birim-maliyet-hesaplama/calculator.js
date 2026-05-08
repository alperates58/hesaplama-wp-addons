function hcBirimMaliyetHesapla() {
    const total = parseFloat(document.getElementById('hc-bm-total').value) || 0;
    const qty = parseFloat(document.getElementById('hc-bm-qty').value) || 0;

    if (total <= 0 || qty <= 0) {
        alert('Lütfen toplam maliyet ve miktar bilgilerini giriniz.');
        return;
    }

    const unit = total / qty;

    document.getElementById('hc-bm-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-bm-res-qty').innerText = qty.toLocaleString('tr-TR');
    document.getElementById('hc-bm-res-unit').innerText = unit.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 }) + ' ₺';

    document.getElementById('hc-birim-maliyet-result').classList.add('visible');
}
