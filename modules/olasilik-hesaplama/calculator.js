function hcOlasilikHesapla() {
    const favorable = parseFloat(document.getElementById('hc-prob-favorable').value);
    const total = parseFloat(document.getElementById('hc-prob-total').value);
    const resultDiv = document.getElementById('hc-olasilik-hesaplama-result');

    if (isNaN(favorable) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli sayılar giriniz (Toplam durum > 0 olmalıdır).');
        return;
    }

    if (favorable > total) {
        alert('İstenen durum sayısı toplam durum sayısından büyük olamaz.');
        return;
    }

    const p = favorable / total;
    
    document.getElementById('hc-prob-res-val').innerText = p.toLocaleString('tr-TR', {maximumFractionDigits: 6});
    document.getElementById('hc-prob-res-percent').innerText = `Yüzde: %${(p * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;
    
    // Odds calculation: favorable : (total - favorable)
    const unfavorable = total - favorable;
    document.getElementById('hc-prob-res-odds').innerText = `Oran (Odds): ${favorable} : ${unfavorable}`;

    resultDiv.classList.add('visible');
}
