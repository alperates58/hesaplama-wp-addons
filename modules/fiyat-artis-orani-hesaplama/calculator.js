function hcPriceIncreaseHesapla() {
    const oldP = parseFloat(document.getElementById('hc-pi-old').value);
    const newP = parseFloat(document.getElementById('hc-pi-new').value);

    if (!oldP || !newP) {
        alert('Lütfen fiyatları giriniz.');
        return;
    }

    const diff = newP - oldP;
    const rate = (diff / oldP) * 100;

    document.getElementById('hc-pi-res-val').innerText = `% ${rate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-pi-res-diff').innerText = `Fiyat Farkı: ${diff.toLocaleString('tr-TR', { minimumFractionDigits: 2 })} TL`;

    document.getElementById('hc-price-inc-result').classList.add('visible');
}
