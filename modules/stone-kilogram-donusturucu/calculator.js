function hcStoneToKg() {
    const st = parseFloat(document.getElementById('hc-skd-stone').value);
    const kgInput = document.getElementById('hc-skd-kg');
    const resultDiv = document.getElementById('hc-stone-kilogram-donusturucu-result');
    const summary = document.getElementById('hc-skd-summary');

    if (!isNaN(st)) {
        const kg = st * 6.35029318;
        kgInput.value = kg.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${st.toLocaleString('tr-TR')} st = ${kg.toLocaleString('tr-TR', {maximumFractionDigits: 4})} kg</span>`;
        resultDiv.classList.add('visible');
    } else {
        kgInput.value = '';
        resultDiv.classList.remove('visible');
    }
}

function hcKgToStone() {
    const kg = parseFloat(document.getElementById('hc-skd-kg').value);
    const stInput = document.getElementById('hc-skd-stone');
    const resultDiv = document.getElementById('hc-stone-kilogram-donusturucu-result');
    const summary = document.getElementById('hc-skd-summary');

    if (!isNaN(kg)) {
        const st = kg / 6.35029318;
        stInput.value = st.toFixed(4);
        summary.innerHTML = `<span class="hc-result-value">${kg.toLocaleString('tr-TR')} kg = ${st.toLocaleString('tr-TR', {maximumFractionDigits: 4})} st</span>`;
        resultDiv.classList.add('visible');
    } else {
        stInput.value = '';
        resultDiv.classList.remove('visible');
    }
}
