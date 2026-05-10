function hcGözlükÖlçüsüHesapla() {
    const face = parseFloat(document.getElementById('hc-gl-face').value);

    if (!face) return;

    let size = "Orta";
    let ekartman = "50-54";

    if (face < 13) {
        size = "Küçük";
        ekartman = "47-49";
    } else if (face > 14.5) {
        size = "Büyük";
        ekartman = "55+";
    }

    document.getElementById('hc-gl-val').innerText = ekartman + " mm";
    document.getElementById('hc-gl-details').innerHTML = `
        <strong>Yüz Tipi:</strong> ${size}<br>
        <strong>Köprü Mesafesi:</strong> Genellikle 16-20 mm<br>
        <strong>Sap Uzunluğu:</strong> Genellikle 135-145 mm<br>
        <small>*Gözlük sapının içindeki numaralara bakın (Örn: 52 [] 18 140)</small>
    `;
    document.getElementById('hc-gl-result').classList.add('visible');
}
