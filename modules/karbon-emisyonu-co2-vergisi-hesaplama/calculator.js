function hcCtxHesapla() {
    const gkm = parseFloat(document.getElementById('hc-ctx-gkm').value);

    if (isNaN(gkm)) {
        alert('Lütfen emisyon değerini girin.');
        return;
    }

    let tax = 0;
    if (gkm > 95) {
        if (gkm <= 150) tax = (gkm - 95) * 50;
        else if (gkm <= 200) tax = (55 * 50) + (gkm - 150) * 150;
        else tax = (55 * 50) + (50 * 150) + (gkm - 200) * 300;
    }

    document.getElementById('hc-ctx-val').innerText = tax.toLocaleString('tr-TR') + " ₺";
    document.getElementById('hc-ctx-result').classList.add('visible');
}
