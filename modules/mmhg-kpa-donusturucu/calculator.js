function hcMmhgToKpa() {
    const mmhg = parseFloat(document.getElementById('hc-mkd-mmhg').value);
    const kpaInput = document.getElementById('hc-mkd-kpa');
    const resultDiv = document.getElementById('hc-mmhg-kpa-donusturucu-result');
    const summary = document.getElementById('hc-mkd-summary');

    if (!isNaN(mmhg)) {
        const kpa = mmhg * 0.13332239;
        kpaInput.value = kpa.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${mmhg.toLocaleString('tr-TR')} mmHg = ${kpa.toLocaleString('tr-TR', {maximumFractionDigits: 4})} kPa</span>`;
        resultDiv.classList.add('visible');
    } else {
        kpaInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcKpaToMmhg() {
    const kpa = parseFloat(document.getElementById('hc-mkd-kpa').value);
    const mmhgInput = document.getElementById('hc-mkd-mmhg');
    const resultDiv = document.getElementById('hc-mmhg-kpa-donusturucu-result');
    const summary = document.getElementById('hc-mkd-summary');

    if (!isNaN(kpa)) {
        const mmhg = kpa / 0.13332239;
        mmhgInput.value = mmhg.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${kpa.toLocaleString('tr-TR')} kPa = ${mmhg.toLocaleString('tr-TR', {maximumFractionDigits: 4})} mmHg</span>`;
        resultDiv.classList.add('visible');
    } else {
        mmhgInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
