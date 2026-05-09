function hcDusSuHesapla() {
    const duration = parseFloat(document.getElementById('hc-shower-duration').value);
    const type = document.getElementById('hc-shower-type').value;

    if (isNaN(duration) || duration <= 0) {
        alert('Lütfen geçerli bir süre giriniz.');
        return;
    }

    // 2026 Verileri:
    const flowRates = {
        standard: 9.5,
        eco: 6.5,
        high: 15
    };

    const liters = duration * flowRates[type];
    const yearly = liters * 5 * 52; // Haftada 5 gün baz alınırsa

    document.getElementById('hc-res-shower-liters').innerText = liters.toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-res-shower-desc').innerText = `Haftada 5 duş ile yıllık yaklaşık ${yearly.toLocaleString('tr-TR')} Litre su harcanmaktadır.`;
    
    document.getElementById('hc-dus-su-result').classList.add('visible');
}
