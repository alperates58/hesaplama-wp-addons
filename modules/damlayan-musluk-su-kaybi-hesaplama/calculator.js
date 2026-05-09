function hcMuslukKayipHesapla() {
    const rate = parseFloat(document.getElementById('hc-drip-rate').value);
    const count = parseFloat(document.getElementById('hc-faucet-count').value);

    if (isNaN(rate) || rate <= 0 || isNaN(count) || count <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // 2026 Standartları: 1 ml ~ 20 damla
    // 1 damla = 0.05 ml
    
    const dailyML = rate * 60 * 24 * 0.05 * count;
    const dailyL = dailyML / 1000;
    const monthlyL = dailyL * 30;
    const yearlyM3 = (dailyL * 365) / 1000;

    document.getElementById('hc-res-drip-daily').innerText = dailyL.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' Litre';
    document.getElementById('hc-res-drip-monthly').innerText = monthlyL.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' Litre';
    document.getElementById('hc-res-drip-yearly').innerText = yearlyM3.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' m³';
    
    document.getElementById('hc-musluk-kayip-result').classList.add('visible');
}
