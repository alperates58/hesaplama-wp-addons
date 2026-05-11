function hcCapacityUtilHesapla() {
    const actual = parseFloat(document.getElementById('hc-kko-actual').value);
    const max = parseFloat(document.getElementById('hc-kko-max').value);

    if (isNaN(actual) || isNaN(max) || max <= 0) {
        alert('Lütfen geçerli üretim ve kapasite değerleri girin.');
        return;
    }

    const rate = (actual / max) * 100;
    const idle = 100 - rate;

    document.getElementById('hc-kko-res-val').innerText = '%' + rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-kko-res-desc').innerText = 'Atıl (Boş) Kapasite: %' + (idle < 0 ? 0 : idle).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-kko-result').classList.add('visible');
}
