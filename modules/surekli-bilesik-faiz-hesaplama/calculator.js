function hcSurekliBilesikFaizHesapla() {
    const capital = parseFloat(document.getElementById('hc-sbf-capital').value);
    const rate = parseFloat(document.getElementById('hc-sbf-rate').value);
    const time = parseFloat(document.getElementById('hc-sbf-time').value);

    if (isNaN(capital) || isNaN(rate) || isNaN(time)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const r = rate / 100;
    // FV = P * e^(rt)
    const fv = capital * Math.exp(r * time);
    const interest = fv - capital;

    document.getElementById('hc-sbf-fv').innerText = fv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sbf-interest').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sbf-result').classList.add('visible');
}
