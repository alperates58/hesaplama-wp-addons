function hcEoqHesapla() {
    const d = parseFloat(document.getElementById('hc-eoq-demand').value);
    const s = parseFloat(document.getElementById('hc-eoq-order').value);
    const h = parseFloat(document.getElementById('hc-eoq-holding').value);

    if (!d || !s || !h) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // EOQ = sqrt((2 * D * S) / H)
    const eoq = Math.sqrt((2 * d * s) / h);

    document.getElementById('hc-eoq-value').innerText = Math.round(eoq).toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-eoq-result').classList.add('visible');
}
