function hcIeltsPHesapla() {
    const inputs = document.querySelectorAll('.hc-ielts-p-score');
    let total = 0;
    let valid = true;

    inputs.forEach(input => {
        const val = parseFloat(input.value) || 0;
        if (val < 0 || val > 9) {
            valid = false;
        }
        total += val;
    });

    if (!valid) {
        alert('Her bölüm band skoru 0-9 arasında olmalıdır.');
        return;
    }

    const mean = total / 4;
    let rounded = 0;
    const decimal = mean - Math.floor(mean);

    if (decimal < 0.25) rounded = Math.floor(mean);
    else if (decimal < 0.75) rounded = Math.floor(mean) + 0.5;
    else rounded = Math.ceil(mean);

    document.getElementById('hc-ielts-p-val').innerText = rounded.toFixed(1);
    document.getElementById('hc-ielts-p-result').classList.add('visible');
}
