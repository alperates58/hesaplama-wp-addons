function hcSaltRatioHesapla() {
    const total = parseFloat(document.getElementById('hc-sr-total').value);
    const pct = parseFloat(document.getElementById('hc-sr-type').value);

    if (isNaN(total) || total <= 0) {
        alert('Lütfen toplam ağırlığı giriniz.');
        return;
    }

    const salt = total * (pct / 100);
    // 1 çay kaşığı tuz ~5-6g
    const tsp = salt / 5.5;

    document.getElementById('hc-sr-val').innerText = salt.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-sr-info').innerText = `Yaklaşık ${tsp.toFixed(1)} çay kaşığı tuz gereklidir.`;
    
    document.getElementById('hc-salt-ratio-result').classList.add('visible');
}
