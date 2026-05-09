function hcBriHesapla() {
    const boy = parseFloat(document.getElementById('hc-bri-boy').value) / 100; // m
    const bel = parseFloat(document.getElementById('hc-bri-bel').value) / 100; // m

    if (isNaN(boy) || isNaN(bel) || boy <= 0 || bel <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // BRI Formülü: 364.2 - 365.5 * sqrt(1 - (waist / 2π)^2 / (0.5 * height)^2)
    const numerator = Math.pow(bel / (2 * Math.PI), 2);
    const denominator = Math.pow(0.5 * boy, 2);
    const inner = 1 - (numerator / denominator);
    
    // Ensure inner is positive for sqrt
    const safeInner = Math.max(0, inner);
    const bri = 364.2 - (365.5 * Math.sqrt(safeInner));

    document.getElementById('hc-res-bri-val').innerText = bri.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    let info = '';
    if (bri < 2.5) info = 'Düşük yuvarlaklık seviyesi.';
    else if (bri < 4.5) info = 'Normal aralık. Sağlıklı vücut yapısı.';
    else if (bri < 6.5) info = 'Artan yuvarlaklık, dikkat edilmelidir.';
    else info = 'Yüksek yuvarlaklık seviyesi, sağlık riskleri artabilir.';

    document.getElementById('hc-res-bri-info').innerText = info;
    document.getElementById('hc-bri-result').classList.add('visible');
}
