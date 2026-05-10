function hcPctDiscHesapla() {
    const price = parseFloat(document.getElementById('hc-pd-price').value);
    const pct = parseFloat(document.getElementById('hc-pd-pct').value);

    if (isNaN(price) || isNaN(pct)) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const save = (price * pct) / 100;
    const discounted = price - save;

    document.getElementById('hc-pd-res-val').innerText = discounted.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-pd-save').innerText = `Kazancınız: ${save.toLocaleString('tr-TR')} ₺`;
    document.getElementById('hc-yuzde-indirim-result').classList.add('visible');
}
