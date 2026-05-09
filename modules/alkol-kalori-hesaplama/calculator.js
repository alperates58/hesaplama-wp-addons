function hcAlkolKaloriHesapla() {
    const kcalPer100ml = parseFloat(document.getElementById('hc-alc-type').value);
    const amount = parseFloat(document.getElementById('hc-alc-amount').value);

    if (!amount) {
        alert('Lütfen miktar girin.');
        return;
    }

    const totalKcal = (kcalPer100ml * amount) / 100;

    document.getElementById('hc-alc-value').innerText = Math.round(totalKcal).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-alcohol-calories-result').classList.add('visible');
}
