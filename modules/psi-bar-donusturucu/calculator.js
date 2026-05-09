function hcPsiToBar() {
    const psi = parseFloat(document.getElementById('hc-pbd-psi').value);
    const barInput = document.getElementById('hc-pbd-bar');
    const resultDiv = document.getElementById('hc-psi-bar-donusturucu-result');
    const summary = document.getElementById('hc-pbd-summary');

    if (!isNaN(psi)) {
        const bar = psi * 0.0689475729;
        barInput.value = bar.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${psi.toLocaleString('tr-TR')} psi = ${bar.toLocaleString('tr-TR', {maximumFractionDigits: 4})} bar</span>`;
        resultDiv.classList.add('visible');
    } else {
        barInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcBarToPsi() {
    const bar = parseFloat(document.getElementById('hc-pbd-bar').value);
    const psiInput = document.getElementById('hc-pbd-psi');
    const resultDiv = document.getElementById('hc-psi-bar-donusturucu-result');
    const summary = document.getElementById('hc-pbd-summary');

    if (!isNaN(bar)) {
        const psi = bar / 0.0689475729;
        psiInput.value = psi.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${bar.toLocaleString('tr-TR')} bar = ${psi.toLocaleString('tr-TR', {maximumFractionDigits: 4})} psi</span>`;
        resultDiv.classList.add('visible');
    } else {
        psiInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
