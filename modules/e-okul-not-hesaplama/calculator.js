function hcEokulNotHesapla() {
    const inputs = document.querySelectorAll('.hc-eo-score');
    let total = 0;
    let count = 0;

    inputs.forEach(input => {
        const val = parseFloat(input.value);
        if (!isNaN(val)) {
            total += val;
            count++;
        }
    });

    if (count === 0) {
        alert('Lütfen en az bir not girin.');
        return;
    }

    const average = (total / count).toFixed(2);
    document.getElementById('hc-eo-val').innerText = average;
    document.getElementById('hc-eo-result').classList.add('visible');
}
