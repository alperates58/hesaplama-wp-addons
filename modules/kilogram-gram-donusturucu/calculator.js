function hcKgToGram() {
    const kg = parseFloat(document.getElementById('hc-kg-deger').value);
    const gInput = document.getElementById('hc-g-deger');
    const resultDiv = document.getElementById('hc-kilogram-gram-donusturucu-result');
    const summary = document.getElementById('hc-kg-g-summary');

    if (!isNaN(kg)) {
        const g = kg * 1000;
        gInput.value = g;
        summary.innerHTML = `<span class="hc-result-value">${kg.toLocaleString('tr-TR')} kg = ${g.toLocaleString('tr-TR')} g</span>`;
        resultDiv.classList.add('visible');
    } else {
        gInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcGramToKg() {
    const g = parseFloat(document.getElementById('hc-g-deger').value);
    const kgInput = document.getElementById('hc-kg-deger');
    const resultDiv = document.getElementById('hc-kilogram-gram-donusturucu-result');
    const summary = document.getElementById('hc-kg-g-summary');

    if (!isNaN(g)) {
        const kg = g / 1000;
        kgInput.value = kg;
        summary.innerHTML = `<span class="hc-result-value">${g.toLocaleString('tr-TR')} g = ${kg.toLocaleString('tr-TR')} kg</span>`;
        resultDiv.classList.add('visible');
    } else {
        kgInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
