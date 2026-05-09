function hcHbA1cUnitConvert(source) {
    const percentInput = document.getElementById('hc-hu-percent');
    const mmolInput = document.getElementById('hc-hu-mmol');
    const eagLabel = document.getElementById('hc-hu-eag');

    if (source === 'percent') {
        const p = parseFloat(percentInput.value);
        if (!isNaN(p)) {
            // mmol/mol = (percent - 2.15) / 0.0915
            mmolInput.value = Math.round((p - 2.15) / 0.0915);
            eagLabel.innerText = Math.round((28.7 * p) - 46.7) + ' mg/dL';
        } else {
            mmolInput.value = '';
            eagLabel.innerText = '-';
        }
    } else {
        const m = parseFloat(mmolInput.value);
        if (!isNaN(m)) {
            // percent = (0.0915 * mmol) + 2.15
            const p = (0.0915 * m) + 2.15;
            percentInput.value = p.toFixed(1);
            eagLabel.innerText = Math.round((28.7 * p) - 46.7) + ' mg/dL';
        } else {
            percentInput.value = '';
            eagLabel.innerText = '-';
        }
    }
}
