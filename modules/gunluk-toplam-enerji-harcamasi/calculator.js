function hcTDEEHesapla() {
    const bmr = parseFloat(document.getElementById('hc-tdee-bmh').value);
    const aktivite = parseFloat(document.getElementById('hc-tdee-aktivite').value);

    if (!bmr) {
        alert('Lütfen BMH değerinizi girin.');
        return;
    }

    const tdee = bmr * aktivite;

    document.getElementById('hc-tdee-value').innerText = Math.round(tdee).toLocaleString('tr-TR') + ' kcal/gün';
    document.getElementById('hc-tdee-result').classList.add('visible');
}
