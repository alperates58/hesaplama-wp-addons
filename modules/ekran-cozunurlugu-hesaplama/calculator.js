function hcEkranCozHesapla() {
    const w = parseFloat(document.getElementById('hc-ec-w').value);
    const h = parseFloat(document.getElementById('hc-ec-h').value);
    const dCm = parseFloat(document.getElementById('hc-ec-d').value);

    if (isNaN(w) || isNaN(h) || isNaN(dCm) || dCm <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Toplam Piksel
    const totalPixels = w * h;

    // PPI = sqrt(w^2 + h^2) / d_inch
    const dInch = dCm / 2.54;
    const ppi = Math.sqrt(Math.pow(w, 2) + Math.pow(h, 2)) / dInch;

    // En-Boy Oranı (Basitleştirilmiş)
    function gcd(a, b) {
        return b === 0 ? a : gcd(b, a % b);
    }
    const common = gcd(w, h);
    const ratio = (w / common) + ':' + (h / common);

    document.getElementById('hc-ec-res-ppi').innerText = Math.round(ppi).toLocaleString('tr-TR') + ' PPI';
    document.getElementById('hc-ec-res-total').innerText = 'Toplam Piksel: ' + totalPixels.toLocaleString('tr-TR');
    document.getElementById('hc-ec-res-ratio').innerText = 'En-Boy Oranı: ' + ratio;
    
    document.getElementById('hc-ec-result').classList.add('visible');
}
