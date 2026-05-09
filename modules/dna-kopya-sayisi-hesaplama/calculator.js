function hcDNAKopyaHesapla() {
    const amountNg = parseFloat(document.getElementById('hc-copy-amount').value);
    const lengthBp = parseFloat(document.getElementById('hc-copy-length').value);

    if (isNaN(amountNg) || isNaN(lengthBp) || amountNg <= 0 || lengthBp <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const avogadro = 6.02214076e23;
    const averageMw = 660; // g/mol per bp for dsDNA

    // (ng * 10^-9 * Avogadro) / (bp * 660)
    const copies = (amountNg * 1e-9 * avogadro) / (lengthBp * averageMw);

    document.getElementById('hc-copy-val').innerText = copies.toExponential(3) + ' kopya';
    document.getElementById('hc-copy-result').classList.add('visible');
}
