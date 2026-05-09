function hcBTYHesapla() {
    const t = parseFloat(document.getElementById('hc-bty-temp').value);
    const td = parseFloat(document.getElementById('hc-bty-dew').value);

    if (isNaN(t) || isNaN(td)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (td > t) {
        alert('Çiğ noktası hava sıcaklığından yüksek olamaz.');
        return;
    }

    // Standard approximation: Height (m) = (T - Td) * 125
    const height = (t - td) * 125;

    document.getElementById('hc-bty-val').innerText = height.toLocaleString('tr-TR') + ' m';
    document.getElementById('hc-bty-result').classList.add('visible');
}
