function hcLdpHesapla() {
    const inputs = document.querySelectorAll('.hc-ldp-score');
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
        alert('Lütfen en az bir puan girin.');
        return;
    }

    const average = (total / count).toFixed(2);
    document.getElementById('hc-ldp-val').innerText = average;
    document.getElementById('hc-ldp-result').classList.add('visible');
}
