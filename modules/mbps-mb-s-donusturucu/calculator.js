function hcMbpsToMbs() {
    const mbps = parseFloat(document.getElementById('hc-mmd-mbps').value);
    const mbsInput = document.getElementById('hc-mmd-mbs');
    const resultDiv = document.getElementById('hc-mbps-mb-s-donusturucu-result');
    const summary = document.getElementById('hc-mmd-summary');

    if (!isNaN(mbps)) {
        const mbs = mbps / 8;
        mbsInput.value = mbs;
        summary.innerHTML = `<span class="hc-result-value">${mbps.toLocaleString('tr-TR')} Mbps = ${mbs.toLocaleString('tr-TR', {maximumFractionDigits: 3})} MB/s</span>`;
        resultDiv.classList.add('visible');
    } else {
        mbsInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcMbsToMbps() {
    const mbs = parseFloat(document.getElementById('hc-mmd-mbs').value);
    const mbpsInput = document.getElementById('hc-mmd-mbps');
    const resultDiv = document.getElementById('hc-mbps-mb-s-donusturucu-result');
    const summary = document.getElementById('hc-mmd-summary');

    if (!isNaN(mbs)) {
        const mbps = mbs * 8;
        mbpsInput.value = mbps;
        summary.innerHTML = `<span class="hc-result-value">${mbs.toLocaleString('tr-TR')} MB/s = ${mbps.toLocaleString('tr-TR')} Mbps</span>`;
        resultDiv.classList.add('visible');
    } else {
        mbpsInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
