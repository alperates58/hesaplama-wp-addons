function hcEvTemizliğiÜcretiHesapla() {
    const basePrice = parseFloat(document.getElementById('hc-cl-type').value);
    const modeFactor = parseFloat(document.getElementById('hc-cl-mode').value);

    const total = basePrice * modeFactor;

    document.getElementById('hc-cl-val').innerText = total.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-cl-result').classList.add('visible');
}
