function hcHizIhlaliHesapla() {
    var yol = document.getElementById('hc-hic-yol').value;
    var limit = parseInt(document.getElementById('hc-hic-limit').value) || 0;
    var hiz = parseInt(document.getElementById('hc-hic-hiz').value) || 0;

    if (limit <= 0 || hiz <= 0) {
        alert('Lütfen hız sınırını ve kendi hızınızı giriniz.');
        return;
    }

    if (hiz <= limit) {
        alert('Hızınız sınırın altındadır. Herhangi bir ceza uygulanmaz.');
        return;
    }

    var asim = hiz - limit;
    var ceza = 0;
    var ehliyetYaptirimi = 'Yok';
    var ehliyetColor = '#0f8a5f';
    var detayText = '27 Şubat 2026 yasal düzenlemesine göre km/s bazlı kademeli sistem uygulanmaktadır. %10 tolerans kaldırılmıştır.';

    if (yol === 'ici') {
        if (asim >= 6 && asim <= 10) {
            ceza = 2000;
        } else if (asim >= 11 && asim <= 15) {
            ceza = 4000;
        } else if (asim >= 16 && asim <= 20) {
            ceza = 6000;
        } else if (asim >= 21 && asim <= 25) {
            ceza = 8000;
        } else if (asim >= 26 && asim <= 35) {
            ceza = 12000;
        } else if (asim >= 36 && asim <= 45) {
            ceza = 15000;
        } else if (asim >= 46 && asim <= 55) {
            ceza = 20000;
            ehliyetYaptirimi = '30 Gün El Konulabilir';
            ehliyetColor = '#c0362c';
        } else if (asim >= 56 && asim <= 65) {
            ceza = 25000;
            ehliyetYaptirimi = '60 Gün El Konulabilir';
            ehliyetColor = '#c0362c';
        } else if (asim >= 66) {
            ceza = 30000;
            ehliyetYaptirimi = '90 Gün El Konulabilir';
            ehliyetColor = '#c0362c';
        } else {
            ceza = 0; // 5 km/s ve altı cezasız kalabilir
        }
    } else {
        // Yerleşim yeri dışı
        if (asim >= 11 && asim <= 15) {
            ceza = 2000;
        } else if (asim >= 16 && asim <= 20) {
            ceza = 4000;
        } else if (asim >= 21 && asim <= 25) {
            ceza = 6000;
        } else if (asim >= 26 && asim <= 30) {
            ceza = 8000;
        } else if (asim >= 31 && asim <= 40) {
            ceza = 12000;
        } else if (asim >= 41 && asim <= 50) {
            ceza = 15000;
        } else if (asim >= 51 && asim <= 60) {
            ceza = 20000;
            ehliyetYaptirimi = '30 Gün El Konulabilir';
            ehliyetColor = '#c0362c';
        } else if (asim >= 61 && asim <= 70) {
            ceza = 25000;
            ehliyetYaptirimi = '60 Gün El Konulabilir';
            ehliyetColor = '#c0362c';
        } else if (asim >= 71) {
            ceza = 30000;
            ehliyetYaptirimi = '90 Gün El Konulabilir';
            ehliyetColor = '#c0362c';
        }
    }

    if (ceza === 0) {
        alert('Hız aşımınız yasal sınırın altında veya ceza limiti altındadır.');
        return;
    }

    var indirimli = ceza * 0.75;

    document.getElementById('hc-hic-res-asim').innerText = asim + ' km/s';
    document.getElementById('hc-hic-res-tutar').innerText = ceza.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-hic-res-indirimli').innerText = Math.round(indirimli).toLocaleString('tr-TR') + ' ₺';
    
    var ehliyetTd = document.getElementById('hc-hic-res-ehliyet');
    ehliyetTd.innerText = ehliyetYaptirimi;
    ehliyetTd.style.color = ehliyetColor;

    if (ehliyetYaptirimi !== 'Yok') {
        detayText += ' <br><strong>UYARI:</strong> Hız sınırını çok yüksek oranda aştığınız için para cezasına ek olarak sürücü belgenize yasal olarak geçici el konulma yaptırımı uygulanır.';
    }
    document.getElementById('hc-hic-detay').innerHTML = detayText;

    document.getElementById('hc-hic-result').classList.add('visible');
}