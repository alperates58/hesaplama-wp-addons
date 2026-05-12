function hcSaglikliKahveHesapla() {
    const weight = parseFloat(document.getElementById('hc-coffee-weight').value);
    const sensitivity = parseFloat(document.getElementById('hc-coffee-sensitivity').value);

    if (!weight || weight <= 0) {
        alert('Lütfen kilonuzu giriniz.');
        return;
    }

    // EFSA: ~5.7mg per kg body weight is safe per day
    const safeCaffeine = weight * 5.7 * sensitivity;
    
    // Average cup of coffee (240ml) has ~95mg caffeine
    const cups = safeCaffeine / 95;

    const resultDiv = document.getElementById('hc-healthy-coffee-result');
    document.getElementById('hc-h-coffee-val').innerText = cups.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Fincan (Filtre Kahve)';
    document.getElementById('hc-h-coffee-note').innerText = `Toplam güvenli kafein miktarınız yaklaşık ${Math.round(safeCaffeine)} mg olarak hesaplanmıştır. 2026 sağlık standartlarına göre bu miktar günlük limiti aşmamaktadır.`;
    
    resultDiv.classList.add('visible');
}
