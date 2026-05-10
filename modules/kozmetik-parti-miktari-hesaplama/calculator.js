function hcKozmetikPartiMiktarıHesapla() {
    const unit = parseFloat(document.getElementById('hc-bq-unit').value);
    const count = parseFloat(document.getElementById('hc-bq-count').value);
    const loss = parseFloat(document.getElementById('hc-bq-loss').value) / 100;

    if (!unit || !count) return;

    // Toplam = (Birim * Adet) * (1 + Kayıp)
    const net = unit * count;
    const total = net * (1 + loss);

    let result = "";
    if (total >= 1000) {
        result = (total / 1000).toFixed(2) + ' kg';
    } else {
        result = Math.round(total) + ' g';
    }

    document.getElementById('hc-bq-val').innerText = result;
    document.getElementById('hc-bq-result').classList.add('visible');
}
