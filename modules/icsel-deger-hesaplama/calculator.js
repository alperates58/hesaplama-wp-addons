function hcIntrinsicHesapla() {
    const eps = parseFloat(document.getElementById('hc-iv-eps').value);
    const growth = parseFloat(document.getElementById('hc-iv-growth').value);
    const bondYield = parseFloat(document.getElementById('hc-iv-bond').value);

    if (isNaN(eps) || isNaN(growth) || isNaN(bondYield) || bondYield <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Graham Formülü: V = EPS * (8.5 + 2g) * 4.4 / Y
    // TR uyarlaması için 4.4 yerine güncel AAA veya Risksiz faiz referans alınır.
    const intrinsicValue = (eps * (8.5 + 2 * growth) * 4.4) / bondYield;

    document.getElementById('hc-iv-res-total').innerText = intrinsicValue.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-iv-result').classList.add('visible');
}
