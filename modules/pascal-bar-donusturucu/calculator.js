function hcPaToBar() {
    const pa = parseFloat(document.getElementById('hc-pabd-pa').value);
    const barInput = document.getElementById('hc-pabd-bar');
    const resultDiv = document.getElementById('hc-pascal-bar-donusturucu-result');
    const summary = document.getElementById('hc-pabd-summary');

    if (!isNaN(pa)) {
        const bar = pa / 100000;
        barInput.value = bar;
        summary.innerHTML = `<span class="hc-result-value">${pa.toLocaleString('tr-TR')} Pa = ${bar.toLocaleString('tr-TR', {maximumFractionDigits: 6})} bar</span>`;
        resultDiv.classList.add('visible');
    } else {
        barInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcBarToPa() {
    const bar = parseFloat(document.getElementById('hc-pabd-bar').value);
    const paInput = document.getElementById('hc-pabd-pa');
    const resultDiv = document.getElementById('hc-pascal-bar-donusturucu-result');
    const summary = document.getElementById('hc-pabd-summary');

    if (!isNaN(bar)) {
        const pa = bar * 100000;
        paInput.value = pa;
        summary.innerHTML = `<span class="hc-result-value">${bar.toLocaleString('tr-TR')} bar = ${pa.toLocaleString('tr-TR')} Pa</span>`;
        resultDiv.classList.add('visible');
    } else {
        paInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
