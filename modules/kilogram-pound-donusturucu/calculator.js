function hcKgToLb() {
    const kg = parseFloat(document.getElementById('hc-kpl-kg').value);
    const lbInput = document.getElementById('hc-kpl-lb');
    const resultDiv = document.getElementById('hc-kilogram-pound-donusturucu-result');
    const summary = document.getElementById('hc-kpl-summary');

    if (!isNaN(kg)) {
        const lb = kg * 2.2046226218;
        lbInput.value = lb.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${kg.toLocaleString('tr-TR')} kg = ${lb.toLocaleString('tr-TR', {maximumFractionDigits: 4})} lb</span>`;
        resultDiv.classList.add('visible');
    } else {
        lbInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcLbToKg() {
    const lb = parseFloat(document.getElementById('hc-kpl-lb').value);
    const kgInput = document.getElementById('hc-kpl-kg');
    const resultDiv = document.getElementById('hc-kilogram-pound-donusturucu-result');
    const summary = document.getElementById('hc-kpl-summary');

    if (!isNaN(lb)) {
        const kg = lb * 0.45359237;
        kgInput.value = kg.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${lb.toLocaleString('tr-TR')} lb = ${kg.toLocaleString('tr-TR', {maximumFractionDigits: 4})} kg</span>`;
        resultDiv.classList.add('visible');
    } else {
        kgInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
