function hcLiseOrtHesapla() {
    const inputs = document.querySelectorAll('.hc-lo-grade');
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
        alert('Lütfen en az bir sınıf ortalaması girin.');
        return;
    }

    const average = (total / count).toFixed(2);
    document.getElementById('hc-lo-val').innerText = average;
    document.getElementById('hc-lo-result').classList.add('visible');
}
