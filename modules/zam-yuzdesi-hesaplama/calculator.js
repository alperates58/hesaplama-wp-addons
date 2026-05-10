function hcRaisePctHesapla() {
    const val = parseFloat(document.getElementById('hc-rp-val').value);
    const pct = parseFloat(document.getElementById('hc-rp-pct').value);

    if (isNaN(val) || isNaN(pct)) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const res = val + (val * pct / 100);

    document.getElementById('hc-rp-res-val').innerText = res.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-zam-yuzdesi-result').classList.add('visible');
}
