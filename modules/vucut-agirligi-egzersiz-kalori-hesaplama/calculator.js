function hcBodyweightCaloriesHesapla() {
    const weight = parseFloat(document.getElementById('hc-bw-weight').value);
    const met = parseFloat(document.getElementById('hc-bw-intensity').value);
    const time = parseFloat(document.getElementById('hc-bw-time').value);

    if (!weight || !time) {
        alert('Lütfen ağırlık ve süre bilgilerini giriniz.');
        return;
    }

    const calories = met * weight * (time / 60);

    document.getElementById('hc-bw-res-val').innerText = calories.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal';
    document.getElementById('hc-bw-result').classList.add('visible');
}
