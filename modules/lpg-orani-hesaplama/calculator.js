function hcLPGOranıHesapla() {
    const propane = parseFloat(document.getElementById('hc-lr-propane').value);
    const butane = parseFloat(document.getElementById('hc-lr-butane').value);

    if (isNaN(propane) || isNaN(butane)) return;
    if (Math.abs(propane + butane - 100) > 0.1) {
        alert('Toplam oran %100 olmalıdır.');
        return;
    }

    // Isıl Değerler (Alt Isıl Değer, yaklaşık):
    // Propan: 46.3 MJ/kg, Bütan: 45.7 MJ/kg
    // Yoğunluk: Propan ~0.51 kg/L, Bütan ~0.58 kg/L
    const density = (propane / 100) * 0.51 + (butane / 100) * 0.58;
    const calorific = (propane / 100) * 46.3 + (butane / 100) * 45.7;

    document.getElementById('hc-lr-stats').innerHTML = `
        🌡️ <strong>Ortalama Yoğunluk:</strong> ${density.toFixed(3)} kg/L<br>
        🔥 <strong>Alt Isıl Değer:</strong> ${calorific.toFixed(2)} MJ/kg<br>
        ⛽ <strong>Kullanım Mevsimi:</strong> ${propane > 35 ? 'Kış Karışımı' : 'Yaz Karışımı'}
    `;
    document.getElementById('hc-lr-result').classList.add('visible');
}
