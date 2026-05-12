function hcLokmaHesapla() {
    const count = parseInt(document.getElementById('hc-lok-count').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Standard catering rule in Turkey: 10kg flour for 100 people
    const flourKg = count * 0.1;
    // 1kg flour yields approx 50-60 portions (of 8-10 pieces)
    const totalPieces = flourKg * 550; // approx average pieces

    const resultDiv = document.getElementById('hc-lokma-result');
    document.getElementById('hc-lok-res-flour').innerText = flourKg.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    document.getElementById('hc-lok-res-total').innerText = Math.round(totalPieces).toLocaleString('tr-TR') + ' Adet';
    
    resultDiv.classList.add('visible');
}
