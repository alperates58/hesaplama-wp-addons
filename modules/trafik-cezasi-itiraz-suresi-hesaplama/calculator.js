function hcTrafikItirazHesapla() {
    var tebligStr = document.getElementById('hc-tci-teblig').value;

    if (!tebligStr) {
        alert('Lütfen cezanın tebliğ edildiği tarihi seçiniz.');
        return;
    }

    var teblig = new Date(tebligStr);
    
    // Yasal itiraz süresi 15 gündür (tebliğ günü hariç)
    var sonGun = new Date(teblig);
    sonGun.setDate(teblig.getDate() + 15);

    // Hafta sonu kontrolü (Cumartesi -> Pazartesi, Pazar -> Pazartesi)
    var dayOfWeek = sonGun.getDay();
    var extendedDays = 0;
    if (dayOfWeek === 6) { // Cumartesi
        sonGun.setDate(sonGun.getDate() + 2);
        extendedDays = 2;
    } else if (dayOfWeek === 0) { // Pazar
        sonGun.setDate(sonGun.getDate() + 1);
        extendedDays = 1;
    }

    var bugun = new Date();
    bugun.setHours(0,0,0,0);
    var diffTime = sonGun - bugun;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    var kalanText = '';
    if (diffDays < 0) {
        kalanText = 'Süre Doldu (Tarih Geçti)';
    } else if (diffDays === 0) {
        kalanText = 'Bugün Son Gün!';
    } else {
        kalanText = diffDays + ' Gün Kaldı';
    }

    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('hc-tci-res-teblig').innerText = teblig.toLocaleDateString('tr-TR', options);
    document.getElementById('hc-tci-res-son-gun').innerText = sonGun.toLocaleDateString('tr-TR', options) + (extendedDays > 0 ? ' (Hafta sonu tatile denk geldiği için uzatılmıştır)' : '');
    document.getElementById('hc-tci-res-kalan').innerText = kalanText;

    document.getElementById('hc-tci-result').classList.add('visible');
}