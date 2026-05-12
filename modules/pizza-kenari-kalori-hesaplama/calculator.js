function hcCrustCalHesapla() {
    const d = parseFloat(document.getElementById('hc-pcc-diameter').value);
    const kcalPerCm = parseFloat(document.getElementById('hc-pcc-type').value);

    if (!d || d <= 0) {
        alert('Lütfen pizza çapını giriniz.');
        return;
    }

    const circumference = Math.PI * d;
    const totalKcal = circumference * kcalPerCm;

    const resultDiv = document.getElementById('hc-pizza-crust-cal-result');
    document.getElementById('hc-pcc-res-val').innerText = Math.round(totalKcal).toLocaleString('tr-TR') + ' kcal';
    
    resultDiv.classList.add('visible');
}
