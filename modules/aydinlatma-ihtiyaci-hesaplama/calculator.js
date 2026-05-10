function hcAydınlatmaİhtiyacıHesapla() {
    const area = parseFloat(document.getElementById('hc-li-area').value);
    const lux = parseFloat(document.getElementById('hc-li-room').value);

    if (!area) return;

    const totalLumen = area * lux;
    
    // Ortalama bir LED ampul 800 lümen (60W eşdeğeri)
    const bulbs = Math.ceil(totalLumen / 800);

    document.getElementById('hc-li-val').innerText = totalLumen.toLocaleString('tr-TR') + ' Lümen';
    document.getElementById('hc-li-bulbs').innerText = `Yaklaşık ${bulbs} adet standart LED ampul (800 lm) gereklidir.`;
    document.getElementById('hc-li-result').classList.add('visible');
}
