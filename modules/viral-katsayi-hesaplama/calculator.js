function hcViralKatsayiHesapla() {
    var N0 = parseFloat(document.getElementById('hc-vk-kullanici').value);
    var i = parseFloat(document.getElementById('hc-vk-davet').value);
    var c = parseFloat(document.getElementById('hc-vk-donusum').value) / 100;
    var dongu = parseFloat(document.getElementById('hc-vk-dongu').value);
    var sure = parseFloat(document.getElementById('hc-vk-sure').value);

    if (!N0 || N0 <= 0) {
        alert('Lütfen geçerli bir başlangıç kullanıcı sayısı girin.');
        return;
    }
    if (isNaN(i) || i < 0) {
        alert('Lütfen geçerli bir davet sayısı girin.');
        return;
    }
    if (isNaN(c) || c < 0 || c > 1) {
        alert('Lütfen %0 ile %100 arasında geçerli bir dönüşüm oranı girin.');
        return;
    }
    if (!dongu || dongu <= 0) {
        alert('Lütfen geçerli bir döngü süresi girin.');
        return;
    }
    if (!sure || sure <= 0) {
        alert('Lütfen geçerli bir projeksiyon süresi girin.');
        return;
    }

    var K = i * c;
    var cycles = sure / dongu;
    var toplamKullanici = 0;

    if (Math.abs(K - 1) < 0.0001) {
        toplamKullanici = N0 * (cycles + 1);
    } else {
        toplamKullanici = N0 * (1 - Math.pow(K, cycles + 1)) / (1 - K);
    }

    // Toplam kullanıcı sayısı infinity veya NaN olmasını önlemek için güvenlik kontrolü
    if (isNaN(toplamKullanici) || !isFinite(toplamKullanici)) {
        toplamKullanici = N0;
    }

    var yeniKullanicilar = toplamKullanici - N0;
    if (yeniKullanicilar < 0) yeniKullanicilar = 0;

    var fmtSayi = function(val) {
        return Math.round(val).toLocaleString('tr-TR');
    };

    document.getElementById('hc-vk-res-k').textContent = K.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });
    document.getElementById('hc-vk-res-yeni').textContent = fmtSayi(yeniKullanicilar) + ' kişi';
    document.getElementById('hc-vk-res-toplam').textContent = fmtSayi(toplamKullanic) + ' kullanıcı';

    var durum = '';
    var renk = '';
    if (K > 1) {
        durum = 'Eksponansiyel Büyüme (K > 1)! Ürününüz kendi kendine katlanarak yayılıyor.';
        renk = 'var(--hc-front-green)';
    } else if (K === 1) {
        durum = 'Lineer Büyüme (K = 1). Stabil büyüme hızı.';
        renk = 'var(--hc-front-text)';
    } else {
        durum = 'Sönümlenen Büyüme (K < 1). Büyüme dış kanallar olmadan zamanla duracaktır.';
        renk = 'var(--hc-front-red)';
    }

    var durumEl = document.getElementById('hc-vk-res-durum');
    durumEl.textContent = durum;
    durumEl.style.color = renk;

    document.getElementById('hc-viral-katsayi-result').classList.add('visible');
}
