function hcStressHesapla() {
    var qs = document.querySelectorAll('.hc-stress-q');
    var toplam = 0;

    for (var i = 0; i < qs.length; i++) {
        var el = qs[i];
        var val = parseInt(el.value) || 0;
        var type = el.getAttribute('data-type');
        
        if (type === 'reverse') {
            // Ters puanlanan sorular (0=4, 1=3, 2=2, 3=1, 4=0)
            toplam += (4 - val);
        } else {
            toplam += val;
        }
    }

    var durum = '';
    var tavsiye = '';
    var renk = '#22c55e';

    if (toplam >= 14) {
        durum = 'Yüksek Stres Seviyesi (Önlem Alınmalı)';
        tavsiye = 'Günlük hayatınızda yoğun bir stres yükü altındasınız. Stres yönetimi tekniklerini uygulamalı, meditasyon yapmalı veya gevşeme egzersizleri denemelisiniz.';
        renk = '#ef4444';
    } else if (toplam >= 7) {
        durum = 'Orta Derece / Yönetilebilir Stres';
        tavsiye = 'Ortalama düzeyde stres deneyimliyorsunuz. Kısa yürüyüşler ve uyku kalitesini artırıcı önlemler fayda sağlayacaktır.';
        renk = '#eab308';
    } else {
        durum = 'Düşük Stres / Sakin Zihin';
        tavsiye = 'Zihniniz oldukça dingin durumda. Bu sağlıklı dengeyi korumak için hobilerinize zaman ayırmaya devam edin.';
        renk = 'var(--hc-front-green)';
    }

    document.getElementById('hc-stress-res-skor').innerText = toplam + ' / 20';
    document.getElementById('hc-stress-res-skor').style.color = renk;
    document.getElementById('hc-stress-res-durum').innerText = durum;
    document.getElementById('hc-stress-res-durum').style.color = renk;
    document.getElementById('hc-stress-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-stress-result').classList.add('visible');
}