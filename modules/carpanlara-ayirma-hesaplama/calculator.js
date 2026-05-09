// Çarpanlara Ayırma Hesaplama - JavaScript
function hcCarpanlaraAyirmaHesapla() {
    const input = document.getElementById('hc-carpanlara-ayirma-sayi');
    const value = parseInt(input.value, 10);
    if (!value || value < 1) {
        alert('Lütfen geçerli bir pozitif tam sayı girin.');
        return;
    }
    let n = value;
    const factors = [];
    // 2'den başlayarak asal çarpanları bul
    for (let i = 2; i <= Math.sqrt(n); i++) {
        while (n % i === 0) {
            factors.push(i);
            n = n / i;
        }
    }
    if (n > 1) {
        factors.push(n);
    }
    const resultStr = factors.join(' × ');
    const resultDiv = document.getElementById('hc-carpanlara-ayirma-hesaplama-result');
    const resultValue = document.getElementById('hc-carpanlara-ayirma-hesaplama-value');
    resultValue.textContent = resultStr + ' (çarpanlar)';
    resultDiv.classList.add('visible');
}
