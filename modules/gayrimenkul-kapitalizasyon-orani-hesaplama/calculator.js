function hcGayrimenkulKapitalizasyonOraniHesapla() {
    const noi = parseFloat(document.getElementById('hc-cr-noi').value);
    const value = parseFloat(document.getElementById('hc-cr-value').value);

    if (!noi || !value) {
        alert('Lütfen net gelir ve piyasa değerini girin.');
        return;
    }

    // Cap Rate = NOI / Value
    const capRate = (noi / value) * 100;

    document.getElementById('hc-cr-output').innerText = '%' + capRate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-cr-result').classList.add('visible');
}
