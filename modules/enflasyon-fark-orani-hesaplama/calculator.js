function hcInflationHesapla() {
    const start = parseFloat(document.getElementById('hc-inf-start').value);
    const end = parseFloat(document.getElementById('hc-inf-end').value);

    if (!start || !end) {
        alert('Lütfen endeks değerlerini giriniz.');
        return;
    }

    const rate = ((end - start) / start) * 100;

    document.getElementById('hc-inf-res-val').innerText = `% ${rate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-inf-res-desc').innerText = `Artış Katsayısı: ${(end / start).toFixed(4)}`;

    document.getElementById('hc-inflation-result').classList.add('visible');
}
