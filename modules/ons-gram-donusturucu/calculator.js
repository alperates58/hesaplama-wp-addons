function hcOnsToGram() {
    const ons = parseFloat(document.getElementById('hc-ogd-ons').value);
    const gramInput = document.getElementById('hc-ogd-gram');
    const resultDiv = document.getElementById('hc-ons-gram-donusturucu-result');
    const summary = document.getElementById('hc-ogd-summary');

    if (!isNaN(ons)) {
        const gram = ons * 28.3495231;
        gramInput.value = gram.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${ons.toLocaleString('tr-TR')} oz = ${gram.toLocaleString('tr-TR', {maximumFractionDigits: 4})} g</span>`;
        resultDiv.classList.add('visible');
    } else {
        gramInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcGramToOns() {
    const gram = parseFloat(document.getElementById('hc-ogd-gram').value);
    const onsInput = document.getElementById('hc-ogd-ons');
    const resultDiv = document.getElementById('hc-ons-gram-donusturucu-result');
    const summary = document.getElementById('hc-ogd-summary');

    if (!isNaN(gram)) {
        const ons = gram / 28.3495231;
        onsInput.value = ons.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${gram.toLocaleString('tr-TR')} g = ${ons.toLocaleString('tr-TR', {maximumFractionDigits: 4})} oz</span>`;
        resultDiv.classList.add('visible');
    } else {
        onsInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
