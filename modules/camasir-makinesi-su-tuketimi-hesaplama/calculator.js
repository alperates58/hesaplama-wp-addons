function hcCamasirSuHesapla() {
    const freq = parseFloat(document.getElementById('hc-wm-frequency').value);
    const type = document.getElementById('hc-wm-type').value;

    if (isNaN(freq) || freq <= 0) {
        alert('Lütfen geçerli bir yıkama sayısı giriniz.');
        return;
    }

    // 2026 Verileri:
    const liters = {
        he: 45,
        standard: 70,
        old: 120
    };

    const yearlyLiters = freq * 52 * liters[type];
    const damacana = yearlyLiters / 19;

    document.getElementById('hc-res-wm-yearly').innerText = yearlyLiters.toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-res-wm-desc').innerText = `Bu miktar yaklaşık ${Math.round(damacana).toLocaleString('tr-TR')} standart damacana (19L) suya eşittir.`;
    
    document.getElementById('hc-camasir-su-result').classList.add('visible');
}
