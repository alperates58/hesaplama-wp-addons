function hcVizeRiskHesapla() {
    var isDurumu = document.getElementById('hc-vrr-is').value;
    var gelir = parseFloat(document.getElementById('hc-vrr-gelir').value) || 0;
    var banka = parseFloat(document.getElementById('hc-vrr-banka').value) || 0;
    var gecmis = document.getElementById('hc-vrr-gecmis').value;

    // Baz risk puanı (0-100 arası, yüksek puan = yüksek onay şansı)
    var onaySansi = 50;

    if (isDurumu === 'sgk' || isDurumu === 'owner') onaySansi += 20;
    else if (isDurumu === 'ogrenci') onaySansi += 10;
    else if (isDurumu === 'issiz') onaySansi -= 25;

    // Gelir etkisi
    if (gelir > 70000) onaySansi += 15;
    else if (gelir > 30000) onaySansi += 5;
    else onaySansi -= 10;

    // Bankadaki bakiye
    if (banka > 300000) onaySansi += 15;
    else if (banka < 75000) onaySansi -= 15;

    // Geçmiş
    if (gecmis === 'active') onaySansi += 20;
    else if (gecmis === 'old') onaySansi += 10;
    else if (gecmis === 'reject') onaySansi -= 20;

    // Limitler
    onaySansi = Math.min(95, Math.max(5, onaySansi));

    var derece = 'Orta Derece Risk';
    var tavsiye = 'Banka hesabınızdaki parayı son 3 günde toplu yatırmak yerine zamana yayarak yatırın.';
    var renk = '#eab308';

    if (onaySansi >= 80) {
        derece = 'Çok Düşük Risk / Güçlü Başvuru';
        tavsiye = 'Maddi durumunuz ve seyahat geçmişiniz çok iyi. Konsolosluğa sunacağınız evrakların güncelliğine dikkat edin.';
        renk = 'var(--hc-front-green)';
    } else if (onaySansi < 50) {
        derece = 'Yüksek Risk / Zayıf Başvuru Profili';
        tavsiye = 'Varsa tapu, ruhsat gibi ek malvarlığı evrakları ekleyin ve mutlaka profesyonel bir aracı acenteyle çalışın.';
        renk = '#ef4444';
    }

    document.getElementById('hc-vrr-res-onay').innerText = '%' + Math.round(onaySansi);
    document.getElementById('hc-vrr-res-onay').style.color = renk;
    document.getElementById('hc-vrr-res-derece').innerText = derece;
    document.getElementById('hc-vrr-res-derece').style.color = renk;
    document.getElementById('hc-vrr-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-vrr-result').classList.add('visible');
}