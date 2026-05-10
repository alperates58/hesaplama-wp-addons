function hcJamSugarHesapla() {
    const fruit = parseFloat(document.getElementById('hc-jam-fruit').value);
    const ratio = parseFloat(document.getElementById('hc-jam-type').value);

    if (isNaN(fruit) || fruit <= 0) {
        alert('Lütfen meyve miktarını giriniz.');
        return;
    }

    const sugarKg = fruit * ratio;
    // 1 su bardağı şeker ~170-200g (ortalama 185g)
    const cups = (sugarKg * 1000) / 185;

    document.getElementById('hc-jam-val').innerText = sugarKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-jam-info').innerText = `Yaklaşık ${Math.round(cups)} su bardağı şeker gereklidir.`;
    
    document.getElementById('hc-jam-sugar-result').classList.add('visible');
}
