function hcKatchMcArdleHesapla() {
    const kilo = parseFloat(document.getElementById('hc-km-kilo').value);
    const yag = parseFloat(document.getElementById('hc-km-yag').value);

    if (!kilo || isNaN(yag)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // LBM = Weight * (1 - Body Fat%)
    const lbm = kilo * (1 - (yag / 100));
    const bmr = 370 + (21.6 * lbm);

    document.getElementById('hc-km-lbm').innerText = lbm.toFixed(1).toLocaleString('tr-TR') + ' kg';
    document.getElementById('hc-km-value').innerText = Math.round(bmr).toLocaleString('tr-TR') + ' kcal/gün';

    document.getElementById('hc-katch-mcardle-result').classList.add('visible');
}
