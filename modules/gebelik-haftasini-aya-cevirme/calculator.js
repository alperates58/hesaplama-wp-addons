function hcHaftaAyHesapla() {
    var hafta = parseInt(document.getElementById('hc-ha-hafta').value);
    
    if (isNaN(hafta) || hafta < 1) {
        alert('Lütfen geçerli bir hafta giriniz.');
        return;
    }

    var ay = "";
    var yorum = "";

    if (hafta <= 4) { ay = "1. Ay"; yorum = "Henüz yolun başındasınız, 1. ayın içindesiniz."; }
    else if (hafta <= 8) { ay = "2. Ay"; yorum = "Bebeğiniz hızla büyüyor, 2. ayın içindesiniz."; }
    else if (hafta <= 13) { ay = "3. Ay"; yorum = "İlk trimester bitmek üzere, 3. ayın içindesiniz."; }
    else if (hafta <= 17) { ay = "4. Ay"; yorum = "İkinci trimester başladı, 4. ayın içindesiniz."; }
    else if (hafta <= 21) { ay = "5. Ay"; yorum = "Yolu yarıladınız, 5. ayın içindesiniz."; }
    else if (hafta <= 25) { ay = "6. Ay"; yorum = "6. ayın içindesiniz."; }
    else if (hafta <= 30) { ay = "7. Ay"; yorum = "Üçüncü trimester başladı, 7. ayın içindesiniz."; }
    else if (hafta <= 34) { ay = "8. Ay"; yorum = "Bebek artık oldukça ağırlaştı, 8. ayın içindesiniz."; }
    else if (hafta <= 40) { ay = "9. Ay"; yorum = "Büyük gün yaklaşıyor, 9. ayın içindesiniz."; }
    else { ay = "Doğum Zamanı"; yorum = "40 haftayı tamamladınız, her an doğum gerçekleşebilir."; }

    var resDiv = document.getElementById('hc-ha-result');
    var ayDiv = document.getElementById('hc-ha-ay');
    var yorumDiv = document.getElementById('hc-ha-yorum');

    ayDiv.textContent = ay;
    yorumDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
