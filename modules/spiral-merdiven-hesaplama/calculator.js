function hcSpiralStairHesapla() {
    const diam = parseFloat(document.getElementById('hc-ss-diam').value);
    const totalAngle = parseFloat(document.getElementById('hc-ss-angle').value);
    const totalH = parseFloat(document.getElementById('hc-ss-height').value);

    if (!diam || !totalAngle || !totalH) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Standard spiral riser is approx 18-20cm
    const riserCount = Math.round(totalH / 19);
    const actualRiser = totalH / riserCount;
    const stepAngle = totalAngle / riserCount;

    document.getElementById('hc-ss-res-riser').innerText = actualRiser.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-ss-res-step-angle').innerText = stepAngle.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-spiral-result').classList.add('visible');
}
