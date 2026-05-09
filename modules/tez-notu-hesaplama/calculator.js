function hcTezNotuHesapla() {
    const s = parseFloat(document.getElementById('hc-tn-supervisor').value);
    const j = parseFloat(document.getElementById('hc-tn-jury').value);

    if (isNaN(s) || isNaN(j)) {
        alert('Lütfen tüm puanları girin.');
        return;
    }

    const result = (s * 0.5 + j * 0.5).toFixed(2);
    document.getElementById('hc-tn-val').innerText = result;
    document.getElementById('hc-tn-result').classList.add('visible');
}
