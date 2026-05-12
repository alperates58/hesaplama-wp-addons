function hcKahveOraniHesapla() {
    const ratio = parseFloat(document.getElementById('hc-cr-method').value);
    const targetVal = parseFloat(document.getElementById('hc-cr-target-val').value);
    const targetUnit = document.getElementById('hc-cr-target-unit').value;

    if (!targetVal || targetVal <= 0) {
        alert('Lütfen geçerli bir miktar giriniz.');
        return;
    }

    let water, coffee;

    if (targetUnit === 'water') {
        water = targetVal;
        coffee = water / ratio;
    } else {
        coffee = targetVal;
        water = coffee * ratio;
    }

    const resultDiv = document.getElementById('hc-coffee-ratio-result');
    document.getElementById('hc-cr-res-water').innerText = Math.round(water).toLocaleString('tr-TR') + ' ml';
    document.getElementById('hc-cr-res-coffee').innerText = coffee.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    
    document.getElementById('hc-cr-note').innerText = `Altın oran (Golden Ratio) 1:${ratio} baz alınmıştır.`;
    
    resultDiv.classList.add('visible');
}
