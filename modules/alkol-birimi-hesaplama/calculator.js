function hcAlkolBirimiHesapla() {
    const hacim = parseFloat(document.getElementById('hc-abh-hacim').value);
    const oran = parseFloat(document.getElementById('hc-abh-oran').value);

    if (isNaN(hacim) || isNaN(oran)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const birim = (hacim * oran) / 1000;

    document.getElementById('hc-abh-res-birim').innerText = birim.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Birim';
    document.getElementById('hc-alkol-birimi-hesaplama-result').classList.add('visible');
}
