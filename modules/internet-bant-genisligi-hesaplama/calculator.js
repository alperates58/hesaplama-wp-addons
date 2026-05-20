function hcInternetBantGenisligiHesapla() {
    var kullanici = parseFloat(document.getElementById('hc-ibg-kullanici').value);
    var profil = parseFloat(document.getElementById('hc-ibg-profil').value);
    var aktiflik = parseFloat(document.getElementById('hc-ibg-aktiflik').value);

    if (isNaN(kullanici) || kullanici <= 0) {
        alert('Lütfen geçerli bir kullanıcı / cihaz sayısı girin.');
        return;
    }
    if (isNaN(aktiflik) || aktiflik < 10 || aktiflik > 100) {
        alert('Eş zamanlı aktiflik oranı %10 ile %100 arasında olmalıdır.');
        return;
    }

    var makBant = kullanici * profil;
    // Eş zamanlılığa göre ve ek emniyet payı olarak 5 Mbps ekliyoruz
    var onerilenBant = (makBant * (aktiflik / 100)) + 5;
    
    // Hızları tam sayıya yuvarla
    makBant = Math.ceil(makBant);
    onerilenBant = Math.ceil(onerilenBant);

    document.getElementById('hc-ibg-res-maks').textContent = makBant.toLocaleString('tr-TR') + ' Mbps';
    document.getElementById('hc-ibg-res-asgari').textContent = onerilenBant.toLocaleString('tr-TR') + ' Mbps';

    var paket = '';
    if (onerilenBant <= 16) {
        paket = '16 Mbps ADSL / VDSL Giriş Paketi (Temel kullanım için uygun)';
    } else if (onerilenBant > 16 && onerilenBant <= 35) {
        paket = '35 Mbps VDSL / Fiber Paketi (Orta seviye ev kullanımı)';
    } else if (onerilenBant > 35 && onerilenBant <= 100) {
        paket = '100 Mbps Fiber Paketi (İdeal aile paketi, çoklu cihaz bağlantısı)';
    } else if (onerilenBant > 100 && onerilenBant <= 200) {
        paket = '200 Mbps Fiber Paketi (Yüksek hızlı indirme ve akıcı çoklu oyun)';
    } else if (onerilenBant > 200 && onerilenBant <= 500) {
        paket = '500 Mbps Fiber Paketi (Profesyonel ev-ofis ve ultra hızlı yükleme/indirme)';
    } else {
        paket = '1000 Mbps (1 Gbps) Gigafiber Paketi (Maksimum performans, kalabalık ortamlar ve gecikmesiz veri aktarımı)';
    }

    document.getElementById('hc-ibg-res-paket').textContent = paket;
    document.getElementById('hc-internet-bandwidth-result').classList.add('visible');
}
