function hcBsaHesapla() {
    const boy = parseFloat(document.getElementById('hc-bsa-boy').value);
    const kilo = parseFloat(document.getElementById('hc-bsa-kilo').value);

    if (isNaN(boy) || isNaN(kilo) || boy <= 0 || kilo <= 0) {
        alert('Lütfen geçerli boy ve kilo değerleri giriniz.');
        return;
    }

    // Mosteller Formülü: BSA = √((Boy * Kilo) / 3600)
    const bsa = Math.sqrt((boy * kilo) / 3600);

    document.getElementById('hc-res-bsa-val').innerText = bsa.toLocaleString('tr-TR', { 
        minimumFractionDigits: 2,
        maximumFractionDigits: 2 
    });

    document.getElementById('hc-bsa-result').classList.add('visible');
    document.getElementById('hc-bsa-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
