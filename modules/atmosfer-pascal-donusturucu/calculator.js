function hcAtmToPa() {
    const atm = parseFloat(document.getElementById('hc-apd-atm').value);
    const paInput = document.getElementById('hc-apd-pa');
    const resultDiv = document.getElementById('hc-atmosfer-pascal-donusturucu-result');
    const summary = document.getElementById('hc-apd-summary');

    if (!isNaN(atm)) {
        const pa = atm * 101325;
        paInput.value = pa;
        summary.innerHTML = `<span class="hc-result-value">${atm.toLocaleString('tr-TR')} atm = ${pa.toLocaleString('tr-TR')} Pa</span>`;
        resultDiv.classList.add('visible');
    } else {
        paInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcPaToAtm() {
    const pa = parseFloat(document.getElementById('hc-apd-pa').value);
    const atmInput = document.getElementById('hc-apd-atm');
    const resultDiv = document.getElementById('hc-atmosfer-pascal-donusturucu-result');
    const summary = document.getElementById('hc-apd-summary');

    if (!isNaN(pa)) {
        const atm = pa / 101325;
        atmInput.value = atm.toFixed(6);
        summary.innerHTML = `<span class="hc-result-value">${pa.toLocaleString('tr-TR')} Pa = ${atm.toLocaleString('tr-TR', {maximumFractionDigits: 6})} atm</span>`;
        resultDiv.classList.add('visible');
    } else {
        atmInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
