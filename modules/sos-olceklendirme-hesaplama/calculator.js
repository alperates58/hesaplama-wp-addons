function hcSauceScaleHesapla() {
    const orig = parseFloat(document.getElementById('hc-ss-orig').value);
    const target = parseFloat(document.getElementById('hc-ss-target').value);
    const amount = parseFloat(document.getElementById('hc-ss-amount').value);

    if (isNaN(orig) || isNaN(target) || isNaN(amount) || orig <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const factor = target / orig;
    const newAmount = amount * factor;

    document.getElementById('hc-ss-res').innerText = newAmount.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g/ml';
    document.getElementById('hc-ss-info').innerText = `Ölçeklendirme katsayısı: ${factor.toFixed(2)}x. Tüm malzemeleri bu katsayı ile çarpabilirsiniz.`;
    
    document.getElementById('hc-sauce-scale-result').classList.add('visible');
}
