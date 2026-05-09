function hcAktifMaddeHesapla() {
    const total = parseFloat(document.getElementById('hc-am-total').value);
    const pct = parseFloat(document.getElementById('hc-am-pct').value);

    if (isNaN(total) || isNaN(pct)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const activeAmount = (total * pct) / 100;

    document.getElementById('hc-am-val').innerText = activeAmount.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g/ml';
    document.getElementById('hc-am-result').classList.add('visible');
}
