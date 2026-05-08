function hcDekarToM2() {
    const dekar = parseFloat(document.getElementById('hc-dmd-dekar').value);
    const m2Input = document.getElementById('hc-dmd-m2');
    const resultDiv = document.getElementById('hc-dekar-metrekare-donusturucu-result');
    const summary = document.getElementById('hc-dmd-summary');

    if (!isNaN(dekar)) {
        const m2 = dekar * 1000;
        m2Input.value = m2;
        summary.innerHTML = `<span class="hc-result-value">${dekar.toLocaleString('tr-TR')} dekar = ${m2.toLocaleString('tr-TR')} m²</span>`;
        resultDiv.classList.add('visible');
    } else {
        m2Input.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcM2ToDekar() {
    const m2 = parseFloat(document.getElementById('hc-dmd-m2').value);
    const dekarInput = document.getElementById('hc-dmd-dekar');
    const resultDiv = document.getElementById('hc-dekar-metrekare-donusturucu-result');
    const summary = document.getElementById('hc-dmd-summary');

    if (!isNaN(m2)) {
        const dekar = m2 / 1000;
        dekarInput.value = dekar;
        summary.innerHTML = `<span class="hc-result-value">${m2.toLocaleString('tr-TR')} m² = ${dekar.toLocaleString('tr-TR')} dekar</span>`;
        resultDiv.classList.add('visible');
    } else {
        dekarInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
