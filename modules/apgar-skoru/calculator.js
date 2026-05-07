function hcApgarHesapla() {
    const q1 = parseInt(document.getElementById('hc-apgar-q1').value);
    const q2 = parseInt(document.getElementById('hc-apgar-q2').value);
    const q3 = parseInt(document.getElementById('hc-apgar-q3').value);
    const q4 = parseInt(document.getElementById('hc-apgar-q4').value);
    const q5 = parseInt(document.getElementById('hc-apgar-q5').value);

    const toplamPuan = q1 + q2 + q3 + q4 + q5;

    document.getElementById('hc-apgar-res-puan').innerText = toplamPuan;
    
    const yorumBox = document.getElementById('hc-apgar-res-yorum');
    let metin = '';
    let bg = '';
    let renk = '';

    if (toplamPuan >= 7) {
        metin = '<strong>NORMAL.</strong><br>Bebeğin durumu iyi olarak kabul edilir.';
        bg = 'rgba(15, 138, 95, 0.1)';
        renk = 'var(--hc-front-green)';
    } else if (toplamPuan >= 4) {
        metin = '<strong>ORTA DÜZEY RİSK.</strong><br>Bebek bazı tıbbi müdahalelere veya yakın takibe ihtiyaç duyabilir.';
        bg = 'rgba(201, 137, 5, 0.1)';
        renk = 'var(--hc-front-gold)';
    } else {
        metin = '<strong>YÜKSEK RİSK / KRİTİK DURUM.</strong><br>Bebek acil tıbbi müdahale ve canlandırma desteğine ihtiyaç duymaktadır.';
        bg = 'rgba(192, 54, 44, 0.1)';
        renk = 'var(--hc-front-red)';
    }

    yorumBox.innerHTML = metin;
    yorumBox.style.background = bg;
    yorumBox.style.color = renk;

    document.getElementById('hc-apgar-skoru-result').classList.add('visible');
}
