function hcTableclothMeterHesapla() {
    const w = parseFloat(document.getElementById('hc-tc-width').value) || 0;
    const l = parseFloat(document.getElementById('hc-tc-len').value) || 0;
    const roll = parseFloat(document.getElementById('hc-tc-roll').value) || 140;

    if (w <= 0 || l <= 0) return;

    let meters = 0;
    if (w <= roll) {
        // Örtü eni kumaş enine sığıyorsa sadece boyunu al
        meters = l / 100;
    } else {
        // Sığmıyorsa yan yana parça eklenmeli (Masa örtüsünde önerilmez ama teknik hesap bu)
        const pieces = Math.ceil(w / roll);
        meters = (pieces * l) / 100;
    }

    document.getElementById('hc-res-tc-meter').innerText = meters.toFixed(2) + ' Metre';
    document.getElementById('hc-tablecloth-meter-result').classList.add('visible');
}
