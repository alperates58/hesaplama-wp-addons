function hcApartmanAidatıHesapla() {
    const total = parseFloat(document.getElementById('hc-ad-total').value);
    const units = parseFloat(document.getElementById('hc-ad-units').value);
    const reserve = parseFloat(document.getElementById('hc-ad-reserve').value) || 0;

    if (!total || !units) return;

    const totalWithReserve = total * (1 + (reserve / 100));
    const perUnit = totalWithReserve / units;

    document.getElementById('hc-ad-val').innerText = perUnit.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-ad-result').classList.add('visible');
}
