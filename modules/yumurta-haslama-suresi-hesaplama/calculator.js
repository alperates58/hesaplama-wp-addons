function hcEggBoilHesapla() {
    const mins = document.getElementById('hc-eb-style').value;

    document.getElementById('hc-eb-val').innerText = mins + ' Dakika';
    document.getElementById('hc-eb-info').innerText = 'Süre su kaynamaya başladıktan ve yumurtalar eklendikten sonra başlar. Yumurtalar oda sıcaklığında olmalıdır.';
    
    document.getElementById('hc-egg-boil-result').classList.add('visible');
}
