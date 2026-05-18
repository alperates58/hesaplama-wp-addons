function hcMalusYasasıHesapla() {
    const i0 = parseFloat(document.getElementById('hc-malus-i0').value);
    const angle = parseFloat(document.getElementById('hc-malus-angle').value);

    if (isNaN(i0) || isNaN(angle) || i0 < 0) {
        alert('Lütfen geçerli bir başlangıç ışık şiddeti ve açı değeri giriniz.');
        return;
    }

    // Dereceyi radyana çevirme
    const rad = angle * (Math.PI / 180);

    // Malus Yasası: I = I0 * cos^2(theta)
    const cosVal = Math.cos(rad);
    const ratio = Math.pow(cosVal, 2); // Geçirgenlik oranı
    const i = i0 * ratio;

    const percentT = ratio * 100;
    const percentA = 100 - percentT;

    document.getElementById('hc-malus-i-val').innerText = i.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' W/m²';
    document.getElementById('hc-malus-ratio-val').innerText = '%' + percentT.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-malus-lost-val').innerText = '%' + percentA.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-malus-yasasi-result').classList.add('visible');
}
