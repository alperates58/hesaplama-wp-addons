function hcDepresyonHesapla() {
    var qs = document.querySelectorAll('.hc-phq-q');
    var toplam = 0;

    for (var i = 0; i < qs.length; i++) {
        toplam += parseInt(qs[i].value) || 0;
    }

    var durum = '';
    var not = '';
    var renk = '#22c55e';

    if (toplam >= 11) {
        durum = 'Belirgin / Şiddetli Depresyon Belirtileri';
        not = 'Yüksek düzeyde depresif semptomlar gözlemlenmiştir. Günlük hayat kalitenizin düşmemesi adına bir ruh sağlığı uzmanından (Psikiyatrist/Psikolog) randevu almanız tavsiye edilir.';
        renk = '#ef4444';
    } else if (toplam >= 7) {
        durum = 'Hafif / Orta Derece Depresyon Belirtileri';
        not = 'Hafif düzeyde duygu durum düşüklüğü mevcut. Egzersiz yapmak, sosyal ilişkileri güçlendirmek ve uyku kalitesini artırmak süreci olumlu etkiler.';
        renk = '#eab308';
    } else if (toplam >= 3) {
        durum = 'Eşik Altı / Minimal Semptomlar';
        not = 'Depresif bulgular oldukça sınırda seyrediyor. Geçici dalgalanmalardan kaynaklanıyor olabilir.';
        renk = '#3b82f6';
    } else {
        durum = 'Normal / Sağlıklı Ruh Hali';
        not = 'Belirgin bir depresif durum gözlemlenmemiştir.';
        renk = 'var(--hc-front-green)';
    }

    document.getElementById('hc-phq-res-skor').innerText = toplam + ' / 15';
    document.getElementById('hc-phq-res-skor').style.color = renk;
    document.getElementById('hc-phq-res-durum').innerText = durum;
    document.getElementById('hc-phq-res-durum').style.color = renk;
    document.getElementById('hc-phq-res-not').innerText = not;

    document.getElementById('hc-phq-result').classList.add('visible');
}