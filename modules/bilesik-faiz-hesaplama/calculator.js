function hcBilesikFaizHesapla() {
    const p = parseFloat(document.getElementById('hc-bf-p').value) || 0;
    const r = parseFloat(document.getElementById('hc-bf-r').value) / 100;
    const t = parseFloat(document.getElementById('hc-bf-t').value) || 0;

    // Formula: A = P(1 + r)^t (annual compounding)
    const total = p * Math.pow((1 + r), t);
    const interest = total - p;

    document.getElementById('hc-bf-res-int').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-bf-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-bilesik-faiz-result').classList.add('visible');
}
