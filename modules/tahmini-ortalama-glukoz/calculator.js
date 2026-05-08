function hcEAGConvert(source) {
    const eagInput = document.getElementById('hc-eag-input');
    const hba1cInput = document.getElementById('hc-hba1c-input');

    if (source === 'eag') {
        const val = parseFloat(eagInput.value);
        if (!isNaN(val)) {
            // HbA1c = (eAG + 46.7) / 28.7
            hba1cInput.value = ((val + 46.7) / 28.7).toFixed(1);
        } else {
            hba1cInput.value = '';
        }
    } else {
        const val = parseFloat(hba1cInput.value);
        if (!isNaN(val)) {
            // eAG = (28.7 * HbA1c) - 46.7
            eagInput.value = Math.round((28.7 * val) - 46.7);
        } else {
            eagInput.value = '';
        }
    }
}
