function hcKaskoOranHesapla() {
    var deger = parseFloat(document.getElementById('hc-kdo-deger').value) || 0;
    var prim = parseFloat(document.getElementById('hc-kdo-prim').value) || 0;
    var indirim = parseFloat(document.getElementById('hc-kdo-hasarsizlik').value) || 1.0;

    if (deger <= 0 || prim <= 0) {
        alert('Lütfen geçerli araç değeri ve teklif primi giriniz.');
        return;
    }

    var kaskoOrani = (prim / deger) * 100;

    // Piyasa analizi değerlendirmesi
    var durum = '';
    var renk = 'var(--hc-front-green)';

    if (kaskoOrani < 1.2) {
        durum = 'Çok Düşük / Mükemmel Teklif (Kaçırmayın)';
    } else if (kaskoOrani <= 2.2) {
        durum = 'Ekonomik / Standart Kasko Seviyesi';
    } else if (kaskoOrani <= 3.8) {
        durum = 'Orta Seviye (Kasko poliçe genişliği/kapsamı kontrol edilmeli)';
        renk = 'orange';
    } else {
        durum = 'Yüksek Oran! Teklifi diğer acentelerle karşılaştırmanızı öneririz.';
        renk = 'red';
    }

    var indirimMetni = '';
    if (indirim === 0.5) indirimMetni = 'En Yüksek Seviye (%50) İndirim Uygulanmış';
    else if (indirim < 1.0) indirimMetni = 'Hasarsızlık İndirimi Dahil';
    else if (indirim > 1.0) indirimMetni = 'Hasar Geçmişi Nedeniyle Sürprimli Fiyat';
    else indirimMetni = 'Standart Giriş Seviyesi';

    document.getElementById('hc-kdo-res-oran').innerText = '%' + kaskoOrani.toFixed(2);
    document.getElementById('hc-kdo-res-oran').style.color = renk;
    document.getElementById('hc-kdo-res-degerlendirme').innerText = durum;
    document.getElementById('hc-kdo-res-degerlendirme').style.color = renk;
    document.getElementById('hc-kdo-res-indirim').innerText = indirimMetni;

    document.getElementById('hc-kdo-result').classList.add('visible');
}