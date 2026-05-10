function hcStockWasteHesapla() {
    const loss = parseFloat(document.getElementById('hc-sw-loss').value);
    const total = parseFloat(document.getElementById('hc-sw-total').value);

    if (isNaN(loss) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rate = (loss / total) * 100;

    document.getElementById('hc-sw-res-val').innerText = `% ${rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-stok-fire-result').classList.add('visible');
}
