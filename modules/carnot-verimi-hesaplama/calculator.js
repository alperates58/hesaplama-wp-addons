function hcCarnotHesapla() {
    const ThC = parseFloat(document.getElementById('hc-cv-th').value);
    const TlC = parseFloat(document.getElementById('hc-cv-tl').value);

    if (isNaN(ThC) || isNaN(TlC) || ThC <= TlC) {
        alert('Lütfen geçerli değerler girin (Sıcak kaynak, soğuk kaynaktan yüksek olmalıdır).');
        return;
    }

    const ThK = ThC + 273.15;
    const TlK = TlC + 273.15;

    // eta = 1 - (Tl / Th)
    const eta = 1 - (TlK / ThK);

    document.getElementById('hc-cv-res-val').innerText = '%' + (eta * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-cv-result').classList.add('visible');
}
