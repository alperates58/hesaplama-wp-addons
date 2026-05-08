function hcDpiPikselHesapla() {
    const inch = parseFloat(document.getElementById('hc-dpd-inch').value);
    const dpi = parseFloat(document.getElementById('hc-dpd-dpi').value);
    const resultDiv = document.getElementById('hc-dpi-piksel-donusturucu-result');
    const output = document.getElementById('hc-dpd-output');

    if (!isNaN(inch) && !isNaN(dpi)) {
        const px = Math.round(inch * dpi);
        output.innerHTML = `
            <div class="hc-result-label">${inch} inç @ ${dpi} DPI:</div>
            <div class="hc-result-value">${px.toLocaleString('tr-TR')} piksel</div>
        `;
        resultDiv.classList.add('visible');
    } else {
        resultDiv.classList.remove('visible');
    }
}
