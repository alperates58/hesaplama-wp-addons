function hcSirketDegerlemeHesapla() {
    var tutar = parseFloat(document.getElementById('hc-ysd-tutar').value) || 0;
    var hisse = parseFloat(document.getElementById('hc-ysd-hisse').value) || 0;

    if (tutar <= 0 || hisse <= 0 || hisse >= 100) {
        alert('Lütfen geçerli yatırım tutarı ve hisse oranı giriniz (0-100 arası).');
        return;
    }

    // Post-money = Yatırım Tutarı / (Hisse Oranı / 100)
    var postMoney = tutar / (hisse / 100);
    // Pre-money = Post-money - Yatırım Tutarı
    var preMoney = postMoney - tutar;

    document.getElementById('hc-ysd-res-post').innerText = postMoney.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ysd-res-pre').innerText = preMoney.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-ysd-result').classList.add('visible');
}