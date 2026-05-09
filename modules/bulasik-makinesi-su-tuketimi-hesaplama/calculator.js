function hcBulasikSuHesapla() {
    const freq = parseFloat(document.getElementById('hc-dw-frequency').value);
    const type = document.getElementById('hc-dw-type').value;

    if (isNaN(freq) || freq <= 0) {
        alert('Lütfen geçerli bir kullanım sıklığı giriniz.');
        return;
    }

    // 2026 Verileri:
    // Modern makine: 10 Litre/çevrim
    // Eski makine: 18 Litre/çevrim
    // Elde yıkama: Ortalama 80-100 Litre/makine yükü eşdeğeri
    
    const cycleLiters = (type === 'modern') ? 10 : 18;
    const handLiters = 90;

    const yearlyDW = freq * 52 * cycleLiters;
    const yearlyHand = freq * 52 * handLiters;
    const savings = yearlyHand - yearlyDW;

    document.getElementById('hc-res-dw-yearly').innerText = yearlyDW.toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-res-hand-yearly').innerText = yearlyHand.toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-res-dw-save').innerText = savings.toLocaleString('tr-TR') + ' Litre';
    
    document.getElementById('hc-bulasik-su-result').classList.add('visible');
}
