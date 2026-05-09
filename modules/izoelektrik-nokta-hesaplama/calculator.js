function hcPIHesapla() {
    const pk1 = parseFloat(document.getElementById('hc-pi-pk1').value);
    const pk2 = parseFloat(document.getElementById('hc-pi-pk2').value);

    if (isNaN(pk1) || isNaN(pk2)) {
        alert('Lütfen her iki pKa değerini de giriniz.');
        return;
    }

    // pI = (pKa1 + pKa2) / 2
    const pi = (pk1 + pk2) / 2;

    document.getElementById('hc-pi-val').innerText = pi.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-pi-result').classList.add('visible');
}
