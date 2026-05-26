function hcBurnoutHesapla() {
    var qs = document.querySelectorAll('.hc-burn-q');
    var toplam = 0;
    
    for (var i = 0; i < qs.length; i++) {
        toplam += parseInt(qs[i].value) || 0;
    }

    var durum = '';
    var tavsiye = '';
    var renk = '#22c55e';

    if (toplam >= 20) {
        durum = 'Çok Yüksek Risk / Ciddi Yıpranma';
        tavsiye = 'Tükenmişlik sınırındasınız. Acilen iş yükünü azaltmalı, izin kullanmalı veya profesyonel destek almalısınız.';
        renk = '#ef4444';
    } else if (toplam >= 15) {
        durum = 'Yüksek Risk / Kronik Stres Belirtileri';
        tavsiye = 'Stres seviyeniz alarm veriyor. Hayatınızda iş dışı alanlara vakit ayırın, uyku ve beslenmeye odaklanın.';
        renk = '#eab308';
    } else if (toplam >= 10) {
        durum = 'Orta Derece Yıpranma Belirtileri';
        tavsiye = 'Hafif stres mevcut. Günlük rutinlerinize yürüyüş ve meditasyon gibi dinlendirici eylemler ekleyin.';
        renk = '#3b82f6';
    } else {
        durum = 'Düşük Risk / Sağlıklı Seviye';
        tavsiye = 'Tükenmişlik riskiniz yok. İş ve özel hayat dengeniz son derece sağlıklı seyrediyor.';
        renk = 'var(--hc-front-green)';
    }

    document.getElementById('hc-burn-res-skor').innerText = toplam + ' / 25';
    document.getElementById('hc-burn-res-skor').style.color = renk;
    document.getElementById('hc-burn-res-durum').innerText = durum;
    document.getElementById('hc-burn-res-durum').style.color = renk;
    document.getElementById('hc-burn-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-burn-result').classList.add('visible');
}