function hcProteinConcHesapla() {
    const a280 = parseFloat(document.getElementById('hc-pc-a280').value);
    const coeff = parseFloat(document.getElementById('hc-pc-coeff').value || 1.0);

    if (isNaN(a280)) {
        alert('Lütfen A280 absorbans değerini giriniz.');
        return;
    }

    // Lambert-Beer yasası: A = ε * c * l -> c = A / (ε * l)
    // l (yol uzunluğu) genellikle 1 cm kabul edilir.
    const conc = a280 / coeff;

    const resVal = document.getElementById('hc-pc-res-val');
    resVal.innerText = conc.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-protein-conc-result').classList.add('visible');
}
