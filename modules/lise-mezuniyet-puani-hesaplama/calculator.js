function hcLmpHesapla() {
    const inputs = document.querySelectorAll('.hc-lmp-grade');
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
        alert('Lütfen en az bir sınıf puanı girin.');
        return;
    }

    const average = (total / count).toFixed(2);
    document.getElementById('hc-lmp-val').innerText = average;
    document.getElementById('hc-lmp-result').classList.add('visible');
}
