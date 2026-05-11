function hcCapTotalHesapla() {
    const type = document.getElementById('hc-ct-type').value;
    const input = document.getElementById('hc-ct-values').value;
    
    // Split by comma or space, filter out non-numbers
    const values = input.split(/[, ]+/).map(v => parseFloat(v)).filter(v => !isNaN(v) && v > 0);

    if (values.length === 0) {
        alert('Lütfen en az bir geçerli kapasite değeri girin.');
        return;
    }

    let total = 0;
    if (type === 'par') {
        // Parallel: Sum
        total = values.reduce((a, b) => a + b, 0);
    } else {
        // Series: 1 / Sum(1/Ci)
        const invSum = values.reduce((a, b) => a + (1 / b), 0);
        total = 1 / invSum;
    }

    document.getElementById('hc-ct-res-val').innerText = total.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' μF';
    
    document.getElementById('hc-ct-result').classList.add('visible');
}
