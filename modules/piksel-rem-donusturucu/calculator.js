function hcPxRemUpdate() {
    const px = parseFloat(document.getElementById('hc-prd-px').value);
    if (!isNaN(px)) hcPxToRem();
}

function hcPxToRem() {
    const px = parseFloat(document.getElementById('hc-prd-px').value);
    const base = parseFloat(document.getElementById('hc-prd-base').value);
    const remInput = document.getElementById('hc-prd-rem');
    const resultDiv = document.getElementById('hc-piksel-rem-donusturucu-result');
    const summary = document.getElementById('hc-prd-summary');

    if (!isNaN(px) && !isNaN(base) && base > 0) {
        const rem = px / base;
        remInput.value = rem.toFixed(3);
        summary.innerHTML = `<span class="hc-result-value">${px.toLocaleString('tr-TR')} px = ${rem.toLocaleString('tr-TR', {maximumFractionDigits: 3})} rem</span>`;
        resultDiv.classList.add('visible');
    } else {
        resultDiv.classList.remove('visible');
    }
}

function hcRemToPx() {
    const rem = parseFloat(document.getElementById('hc-prd-rem').value);
    const base = parseFloat(document.getElementById('hc-prd-base').value);
    const pxInput = document.getElementById('hc-prd-px');
    const resultDiv = document.getElementById('hc-piksel-rem-donusturucu-result');
    const summary = document.getElementById('hc-prd-summary');

    if (!isNaN(rem) && !isNaN(base) && base > 0) {
        const px = rem * base;
        pxInput.value = px.toFixed(1);
        summary.innerHTML = `<span class="hc-result-value">${rem.toLocaleString('tr-TR')} rem = ${px.toLocaleString('tr-TR', {maximumFractionDigits: 1})} px</span>`;
        resultDiv.classList.add('visible');
    } else {
        resultDiv.classList.remove('visible');
    }
}
