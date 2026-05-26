function hcDigiHesapla() {
    var qs = document.querySelectorAll('.hc-digi-q');
    var toplam = 0;

    for (var i = 0; i < qs.length; i++) {
        toplam += parseInt(qs[i].value) || 0;
    }

    var durum = '';
    var tavsiye = '';
    var renk = '#22c55e';

    if (toplam >= 20) {
        durum = 'İleri Derece Bağımlılık (Detoks Gerekli)';
        tavsiye = 'Dijital bağımlılığınız yüksek seviyede. Günlük bildirimlerinizi kapatın, ekran süresi limiti ayarlayın ve günün belirli saatlerinde tamamen telefonsuz (dijital detoks) kalın.';
        renk = '#ef4444';
    } else if (toplam >= 14) {
        durum = 'Orta Derece Bağımlılık Riski';
        tavsiye = 'Ekrana bağımlı olma eğilimindesiniz. Sosyal medya uygulamalarına günlük süre sınırlamaları getirmek faydalı olacaktır.';
        renk = '#eab308';
    } else {
        durum = 'Sağlıklı / Kontrollü Kullanım';
        tavsiye = 'Cihaz kullanım alışkanlıklarınız son derece dengeli. Dijital dünyayı hayatınızı yönetmesine izin vermeden kullanıyorsunuz.';
        renk = 'var(--hc-front-green)';
    }

    document.getElementById('hc-digi-res-skor').innerText = toplam + ' / 25';
    document.getElementById('hc-digi-res-skor').style.color = renk;
    document.getElementById('hc-digi-res-durum').innerText = durum;
    document.getElementById('hc-digi-res-durum').style.color = renk;
    document.getElementById('hc-digi-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-digi-result').classList.add('visible');
}