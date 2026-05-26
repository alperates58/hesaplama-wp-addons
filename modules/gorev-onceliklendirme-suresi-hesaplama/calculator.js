function hcGorevOncelikHesapla() {
    var onem = parseFloat(document.getElementById('hc-gos-onem').value) || 5;
    var acil = parseFloat(document.getElementById('hc-gos-aciliyet').value) || 5;
    var caba = parseFloat(document.getElementById('hc-gos-caba').value) || 5;
    var deger = parseFloat(document.getElementById('hc-gos-deger').value) || 5;

    // Öncelik Skoru = (Önem * 0.4) + (Acil * 0.3) + ((Değer / Çaba) * 3) (Maks 100 olacak şekilde ayarla)
    var roi = deger / caba; // Yüksek değer/düşük çaba avantajlıdır
    var rawSkor = (onem * 3.5) + (acil * 3.0) + (roi * 15);
    var skor = Math.min(100, Math.max(10, rawSkor));

    var konum = '';
    var aksiyon = '';
    var renk = '#eab308';

    if (onem >= 6 && acil >= 6) {
        konum = 'Hemen Yap (Do First)';
        aksiyon = 'Geciktirmeden bu göreve odaklanın. Kriz veya acil durum sınıfındadır.';
        renk = '#ef4444';
    } else if (onem >= 6 && acil < 6) {
        konum = 'Planla / Süre Belirle (Schedule)';
        aksiyon = 'Görevi takviminize ekleyin, ne zaman yapacağınızı netleştirin.';
        renk = 'var(--hc-front-green)';
    } else if (onem < 6 && acil >= 6) {
        konum = 'Devret / Delege Et (Delegate)';
        aksiyon = 'Bu görevi başkasına devredebilir veya otomatize edebilirsiniz.';
        renk = '#3b82f6';
    } else {
        konum = 'Eriş / Sil (Eliminate)';
        aksiyon = 'Zaman kaybettiren bir iştir. Yapmasanız da olur veya en son plana atın.';
        renk = '#6b7280';
    }

    document.getElementById('hc-gos-res-skor').innerText = Math.round(skor) + ' / 100';
    document.getElementById('hc-gos-res-skor').style.color = renk;
    document.getElementById('hc-gos-res-matris').innerText = konum;
    document.getElementById('hc-gos-res-matris').style.color = renk;
    document.getElementById('hc-gos-res-aksiyon').innerText = aksiyon;

    document.getElementById('hc-gos-result').classList.add('visible');
}