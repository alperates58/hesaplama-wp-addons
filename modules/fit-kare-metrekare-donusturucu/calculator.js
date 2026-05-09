function hcSqftToM2() {
    const sqft = parseFloat(document.getElementById('hc-fkmd-sqft').value);
    const m2Input = document.getElementById('hc-fkmd-m2');
    const resultDiv = document.getElementById('hc-fit-kare-metrekare-donusturucu-result');
    const summary = document.getElementById('hc-fkmd-summary');

    if (!isNaN(sqft)) {
        const m2 = sqft * 0.09290304;
        m2Input.value = m2.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${sqft.toLocaleString('tr-TR')} sq ft = ${m2.toLocaleString('tr-TR', {maximumFractionDigits: 4})} m²</span>`;
        resultDiv.classList.add('visible');
    } else {
        m2Input.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcM2ToSqft() {
    const m2 = parseFloat(document.getElementById('hc-fkmd-m2').value);
    const sqftInput = document.getElementById('hc-fkmd-sqft');
    const resultDiv = document.getElementById('hc-fit-kare-metrekare-donusturucu-result');
    const summary = document.getElementById('hc-fkmd-summary');

    if (!isNaN(m2)) {
        const sqft = m2 / 0.09290304;
        sqftInput.value = sqft.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${m2.toLocaleString('tr-TR')} m² = ${sqft.toLocaleString('tr-TR', {maximumFractionDigits: 4})} sq ft</span>`;
        resultDiv.classList.add('visible');
    } else {
        sqftInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
