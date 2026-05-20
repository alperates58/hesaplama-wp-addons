function hcOverclockGucArtisiHesapla() {
    var pBase = parseFloat(document.getElementById('hc-ocg-temel-guc').value);
    var fBase = parseFloat(document.getElementById('hc-ocg-temel-frekans').value);
    var fTarget = parseFloat(document.getElementById('hc-ocg-hedef-frekans').value);
    var vBase = parseFloat(document.getElementById('hc-ocg-temel-voltaj').value);
    var vTarget = parseFloat(document.getElementById('hc-ocg-hedef-voltaj').value);

    if (isNaN(pBase) || pBase <= 0 || isNaN(fBase) || fBase <= 0 || isNaN(fTarget) || fTarget <= 0 || isNaN(vBase) || vBase <= 0 || isNaN(vTarget) || vTarget <= 0) {
        alert('Lütfen tüm değerleri sıfırdan büyük olacak şekilde geçerli girin.');
        return;
    }

    if (fTarget < fBase) {
        alert('Hedef frekans, temel frekanstan düşük olamaz (Downclock hesaplaması bu modül kapsamı dışındadır).');
        return;
    }

    // CMOS Güç Tüketimi Formülü: P = C * V^2 * f
    // P_yeni = P_eski * (V_yeni / V_eski)^2 * (f_yeni / f_eski)
    var vRatio = vTarget / vBase;
    var fRatio = fTarget / fBase;
    var pNew = pBase * Math.pow(vRatio, 2) * fRatio;
    
    var artisOrani = ((pNew - pBase) / pBase) * 100;
    var ekGuc = pNew - pBase;

    var fmtSayi = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    document.getElementById('hc-ocg-res-oran').textContent = '%' + fmtSayi(artisOrani, 1) + ' Artış';
    document.getElementById('hc-ocg-res-yeni-guc').textContent = fmtSayi(pNew, 1) + ' W';
    document.getElementById('hc-ocg-res-ek-guc').textContent = '+' + fmtSayi(ekGuc, 1) + ' W ek soğutma gücü ve güç kaynağı payı gerektirir.';

    var yorum = '';
    var renk = '';

    if (vTarget > vBase * 1.2) {
        yorum = 'Kritik Seviye: Voltaj artışı %20\'den fazladır! Bu durum kalıcı donanım hasarına veya aşırı ısınmaya (thermal throttling) yol açabilir. Sıvı azot veya üst düzey özel sıvı soğutma gereklidir.';
        renk = 'var(--hc-front-red)';
    } else if (artisOrani > 40) {
        yorum = 'Yüksek Seviye: Güç tüketimi %40\'tan fazla artmıştır. Güçlü bir 360mm Sıvı Soğutucu ve VRM (anakart güç beslemesi) soğutması şarttır.';
        renk = 'var(--hc-front-orange)';
    } else if (artisOrani > 15) {
        yorum = 'Orta Seviye: Standart hız aşırtma aralığı. Kaliteli bir kule tipi hava soğutucu veya 240mm sıvı soğutucu ile stabil çalıştırılabilir.';
        renk = 'var(--hc-front-blue)';
    } else {
        yorum = 'Güvenli Seviye: Hafif hız aşırtma. Donanımınız büyük olasılıkla stok soğutucusuyla bile stabil ve güvenle çalışacaktır.';
        renk = 'var(--hc-front-green)';
    }

    var yorumEl = document.getElementById('hc-ocg-res-yorum');
    yorumEl.textContent = yorum;
    yorumEl.style.color = renk;

    document.getElementById('hc-overclock-guc-result').classList.add('visible');
}
