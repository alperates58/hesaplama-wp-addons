function hcTonToKg() {
    const ton = parseFloat(document.getElementById('hc-tkd-ton').value);
    const kgInput = document.getElementById('hc-tkd-kg');
    const resultDiv = document.getElementById('hc-ton-kilogram-donusturucu-result');
    const summary = document.getElementById('hc-tkd-summary');

    if (!isNaN(ton)) {
        const kg = ton * 1000;
        kgInput.value = kg;
        summary.innerHTML = `<span class="hc-result-value">${ton.toLocaleString('tr-TR')} t = ${kg.toLocaleString('tr-TR')} kg</span>`;
        resultDiv.classList.add('visible');
    } else {
        kgInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcKgToTon() {
    const kg = parseFloat(document.getElementById('hc-tkd-kg').value);
    const tonInput = document.getElementById('hc-tkd-ton');
    const resultDiv = document.getElementById('hc-ton-kilogram-donusturucu-result');
    const summary = document.getElementById('hc-tkd-summary');

    if (!isNaN(kg)) {
        const ton = kg / 1000;
        tonInput.value = ton;
        summary.innerHTML = `<span class="hc-result-value">${kg.toLocaleString('tr-TR')} kg = ${ton.toLocaleString('tr-TR')} t</span>`;
        resultDiv.classList.add('visible');
    } else {
        tonInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
