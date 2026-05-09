function hcToeflPHesapla() {
    const inputs = document.querySelectorAll('.hc-toefl-p-score');
    let total = 0;
    let valid = true;

    inputs.forEach(input => {
        const val = parseInt(input.value) || 0;
        if (val < 0 || val > 30) {
            valid = false;
        }
        total += val;
    });

    if (!valid) {
        alert('Her bölüm puanı 0-30 arasında olmalıdır.');
        return;
    }

    document.getElementById('hc-toefl-p-val').innerText = total + " / 120";
    document.getElementById('hc-toefl-p-result').classList.add('visible');
}
