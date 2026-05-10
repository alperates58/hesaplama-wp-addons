function hcOrderPctHesapla() {
    const done = parseFloat(document.getElementById('hc-op-done').value);
    const total = parseFloat(document.getElementById('hc-op-total').value);

    if (isNaN(done) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const pct = (done / total) * 100;

    document.getElementById('hc-op-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 1 })}`;
    document.getElementById('hc-siparis-tamamlama-result').classList.add('visible');
}
