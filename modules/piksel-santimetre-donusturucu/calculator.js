function hcPxCmUpdate() {
    const px = parseFloat(document.getElementById('hc-psd-px').value);
    if (!isNaN(px)) hcPxToCm();
}

function hcPxToCm() {
    const px = parseFloat(document.getElementById('hc-psd-px').value);
    const dpi = parseFloat(document.getElementById('hc-psd-dpi').value);
    const cmInput = document.getElementById('hc-psd-cm');
    const resultDiv = document.getElementById('hc-piksel-santimetre-donusturucu-result');
    const summary = document.getElementById('hc-psd-summary');

    if (!isNaN(px) && !isNaN(dpi) && dpi > 0) {
        const cm = (px / dpi) * 2.54;
        cmInput.value = cm.toFixed(2);
        summary.innerHTML = `<span class="hc-result-value">${px.toLocaleString('tr-TR')} px = ${cm.toLocaleString('tr-TR', {maximumFractionDigits: 2})} cm</span>`;
        resultDiv.classList.add('visible');
    } else {
        resultDiv.classList.remove('visible');
    }
}

function hcCmToPx() {
    const cm = parseFloat(document.getElementById('hc-psd-cm').value);
    const dpi = parseFloat(document.getElementById('hc-psd-dpi').value);
    const pxInput = document.getElementById('hc-psd-px');
    const resultDiv = document.getElementById('hc-piksel-santimetre-donusturucu-result');
    const summary = document.getElementById('hc-psd-summary');

    if (!isNaN(cm) && !isNaN(dpi) && dpi > 0) {
        const px = (cm / 2.54) * dpi;
        pxInput.value = Math.round(px);
        summary.innerHTML = `<span class="hc-result-value">${cm.toLocaleString('tr-TR')} cm = ${Math.round(px).toLocaleString('tr-TR')} px</span>`;
        resultDiv.classList.add('visible');
    } else {
        resultDiv.classList.remove('visible');
    }
}
