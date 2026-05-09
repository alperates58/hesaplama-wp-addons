function hcAytDeger(id) {
    var val = parseFloat(document.getElementById(id).value);
    return isNaN(val) ? 0 : val;
}

function hcAytSonucSatiri(etiket, puan) {
    return '<div class="hc-ayt-puan-hesaplama-card">' +
        '<span class="hc-ayt-puan-hesaplama-label">' + etiket + '</span>' +
        '<span class="hc-ayt-puan-hesaplama-value">' + puan.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</span>' +
    '</div>';
}

function hcAytPuanHesapla() {
    var tyt = hcAytDeger('hc-ayt-tyt');
    var diploma = hcAytDeger('hc-ayt-diploma');

    if (tyt <= 0) {
        alert('Lütfen TYT toplam netinizi girin.');
        return;
    }

    if (diploma < 50 || diploma > 100) {
        alert('Lütfen 50 ile 100 arasında geçerli bir diploma notu girin.');
        return;
    }

    var mat = hcAytDeger('hc-ayt-mat');
    var fizik = hcAytDeger('hc-ayt-fizik');
    var kimya = hcAytDeger('hc-ayt-kimya');
    var biyoloji = hcAytDeger('hc-ayt-biyoloji');
    var edebiyat = hcAytDeger('hc-ayt-edebiyat');
    var tarih1 = hcAytDeger('hc-ayt-tarih1');
    var cografya1 = hcAytDeger('hc-ayt-cografya1');
    var tarih2 = hcAytDeger('hc-ayt-tarih2');
    var cografya2 = hcAytDeger('hc-ayt-cografya2');
    var felsefe = hcAytDeger('hc-ayt-felsefe');
    var din = hcAytDeger('hc-ayt-din');
    var ydt = hcAytDeger('hc-ayt-ydt');

    var obp = diploma * 5;
    var obpKatki = obp * 0.12;

    var tytHam = 100 + (tyt * 2.95);

    var sayAlan = (mat * 3.00) + (fizik * 2.85) + (kimya * 3.07) + (biyoloji * 3.07);
    var eaAlan = (mat * 3.00) + (edebiyat * 3.00) + (tarih1 * 2.80) + (cografya1 * 3.33);
    var sozAlan = (edebiyat * 3.00) + (tarih1 * 2.80) + (cografya1 * 3.33) + (tarih2 * 2.91) + (cografya2 * 2.91) + (felsefe * 3.00) + (din * 3.33);
    var dilAlan = ydt * 2.50;

    var sayPuan = tytHam + sayAlan + obpKatki;
    var eaPuan = tytHam + eaAlan + obpKatki;
    var sozPuan = tytHam + sozAlan + obpKatki;
    var dilPuan = tytHam + dilAlan + obpKatki;

    var sonucHTML = '';
    sonucHTML += hcAytSonucSatiri('SAY (Sayısal)', sayPuan);
    sonucHTML += hcAytSonucSatiri('EA (Eşit Ağırlık)', eaPuan);
    sonucHTML += hcAytSonucSatiri('SÖZ (Sözel)', sozPuan);
    sonucHTML += hcAytSonucSatiri('DİL', dilPuan);

    document.getElementById('hc-ayt-sonuclar').innerHTML = sonucHTML;
    document.getElementById('hc-ayt-puan-hesaplama-result').classList.add('visible');
}
