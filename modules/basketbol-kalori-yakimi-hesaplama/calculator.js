function hcBasketballCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-bsk-weight').value);
    const met = parseFloat(document.getElementById('hc-bsk-intensity').value);
    const time = parseFloat(document.getElementById('hc-bsk-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-bsk-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-basketball-result').classList.add('visible');
}
