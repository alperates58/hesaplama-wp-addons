function hcRaiseRateHesapla() {
    const oldVal = parseFloat(document.getElementById('hc-rr-old').value);
    const newVal = parseFloat(document.getElementById('hc-rr-new').value);

    if (isNaN(oldVal) || isNaN(newVal) || oldVal === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const rate = ((newVal - oldVal) / oldVal) * 100;
    const diff = newVal - oldVal;

    document.getElementById('hc-rr-res-val').innerText = `% ${rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-rr-diff').innerText = `Artış Miktarı: ${diff.toLocaleString('tr-TR')} ₺`;
    document.getElementById('hc-zam-orani-result').classList.add('visible');
}
