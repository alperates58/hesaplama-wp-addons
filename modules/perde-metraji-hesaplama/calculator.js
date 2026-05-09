function hcCurtainMeterHesapla() {
    const width = parseFloat(document.getElementById('hc-cm-width').value) || 0;
    const rollWidth = parseFloat(document.getElementById('hc-cm-roll').value) || 280;

    let meters = 0;
    if (rollWidth >= 280) {
        // Eni boyuna yeten kumaşlar için (geniş en)
        meters = width / 100;
    } else {
        // Dar enli kumaşlar için (katlamalı hesaplanır, varsayılan 2.6m boy)
        const pieces = Math.ceil(width / rollWidth);
        meters = pieces * 2.8; // 2.6m boy + 20cm dikiş payı
    }

    document.getElementById('hc-res-cm-total').innerText = meters.toFixed(2) + ' Metre';
    document.getElementById('hc-curtain-meter-result').classList.add('visible');
}
