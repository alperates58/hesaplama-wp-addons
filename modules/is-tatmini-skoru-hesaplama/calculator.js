function hcJobTatminHesapla() {
    var qs = document.querySelectorAll('.hc-job-q');
    var toplam = 0;

    for (var i = 0; i < qs.length; i++) {
        toplam += parseInt(qs[i].value) || 0;
    }

    // Maksimum puan 25'tir. Yüzdeye çevir
    var yuzde = (toplam / 25) * 100;

    var durum = '';
    var tavsiye = '';
    var renk = '#22c55e';

    if (yuzde >= 80) {
        durum = 'Yüksek İş Tatmini (Mutlu Çalışan)';
        tavsiye = 'İşinizde yüksek düzeyde doyum alıyorsunuz. Kuruma olan bağlılığınız ve motivasyonunuz kariyer gelişiminiz için mükemmel bir zemin sunuyor.';
        renk = 'var(--hc-front-green)';
    } else if (yuzde >= 55) {
        durum = 'Orta Seviye İş Tatmini';
        tavsiye = 'İşinizin bazı yönlerinden memnunsunuz ancak gelişim bekleyen alanlar (maaş, iş-özel hayat dengesi veya yönetim ilişkileri gibi) mevcut. Yöneticinizle beklentilerinizi konuşabilirsiniz.';
        renk = '#eab308';
    } else {
        durum = 'Düşük İş Tatmini (Tükenmişlik / İstifa Riski)';
        tavsiye = 'Mevcut işinizde ciddi bir doyumsuzluk yaşıyorsunuz. Görev değişiklikleri veya yeni kariyer fırsatlarını araştırmak motivasyonunuzu geri kazanmak için iyi bir adım olabilir.';
        renk = '#ef4444';
    }

    document.getElementById('hc-job-res-skor').innerText = '%' + Math.round(yuzde) + ' (' + toplam + ' / 25)';
    document.getElementById('hc-job-res-skor').style.color = renk;
    document.getElementById('hc-job-res-durum').innerText = durum;
    document.getElementById('hc-job-res-durum').style.color = renk;
    document.getElementById('hc-job-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-job-result').classList.add('visible');
}