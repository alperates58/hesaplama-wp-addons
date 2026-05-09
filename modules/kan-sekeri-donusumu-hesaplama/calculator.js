function hcGlucoseConvert(source) {
    const mgdlInput = document.getElementById('hc-gc-mgdl');
    const mmollInput = document.getElementById('hc-gc-mmoll');

    if (source === 'mgdl') {
        const val = parseFloat(mgdlInput.value);
        if (!isNaN(val)) {
            mmollInput.value = (val / 18.01).toFixed(2);
        } else {
            mmollInput.value = '';
        }
    } else {
        const val = parseFloat(mmollInput.value);
        if (!isNaN(val)) {
            mgdlInput.value = Math.round(val * 18.01);
        } else {
            mgdlInput.value = '';
        }
    }
}
