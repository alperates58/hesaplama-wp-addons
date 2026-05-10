function hcKopekMamaHesapla() {
    const dailyKcal = parseFloat(document.getElementById('hc-kmm-kcal').value);
    const foodKcalPerKg = parseFloat(document.getElementById('hc-kmm-food').value);

    if (!dailyKcal || !foodKcalPerKg) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // Miktar (kg) = Kalori / (Kcal/kg)
    // Miktar (g) = (Kalori / (Kcal/kg)) * 1000
    const amountGrams = (dailyKcal / foodKcalPerKg) * 1000;

    const resVal = document.getElementById('hc-kmm-res-val');
    resVal.innerText = Math.round(amountGrams).toLocaleString('tr-TR');

    document.getElementById('hc-kopek-mama-result').classList.add('visible');
}
