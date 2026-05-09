function hcDKEHesapla() {
    const i = parseFloat(document.getElementById('hc-dke-i').value);
    const w = parseFloat(document.getElementById('hc-dke-w').value);

    if (isNaN(i) || isNaN(w) || i < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // E = 0.5 * I * w^2
    const energy = 0.5 * i * Math.pow(w, 2);

    document.getElementById('hc-dke-val').innerText = energy.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Joule';
    document.getElementById('hc-dke-result').classList.add('visible');
}
