function hcBrinePctHesapla() {
    const water = parseFloat(document.getElementById('hc-brine-water').value);
    const pct = parseFloat(document.getElementById('hc-brine-type').value);

    if (isNaN(water) || water <= 0) {
        alert('Lütfen su miktarını giriniz.');
        return;
    }

    const saltGrams = water * 1000 * (pct / 100);
    // 1 yemek kaşığı kaya tuzu ~20-25g
    const spoons = saltGrams / 22;

    document.getElementById('hc-brine-val').innerText = Math.round(saltGrams) + ' g Kaya Tuzu';
    document.getElementById('hc-brine-info').innerText = `Yaklaşık ${Math.round(spoons)} tepeleme yemek kaşığı tuz. Salamura için mutlaka iyotsuz kaya tuzu kullanın.`;
    
    document.getElementById('hc-brine-pct-result').classList.add('visible');
}
