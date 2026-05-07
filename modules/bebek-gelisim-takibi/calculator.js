function hcBebekTakipHesapla() {
    const tip = document.getElementById('hc-bt-tip').value;
    const t1 = new Date(document.getElementById('hc-bt-tarih1').value);
    const t2 = new Date(document.getElementById('hc-bt-tarih2').value);
    const v1 = parseFloat(document.getElementById('hc-bt-val1').value);
    const v2 = parseFloat(document.getElementById('hc-bt-val2').value);

    if (isNaN(t1.getTime()) || isNaN(t2.getTime()) || isNaN(v1) || isNaN(v2)) {
        alert('Lütfen tüm tarih ve ölçüm alanlarını doldurunuz.');
        return;
    }

    const sureMs = t2 - t1;
    const sureGun = Math.floor(sureMs / (1000 * 60 * 60 * 24));

    if (sureGun <= 0) {
        alert('Yeni tarih eski tarihten sonra olmalıdır.');
        return;
    }

    const fark = v2 - v1;
    const gunlukHiz = fark / sureGun;

    let birim = 'kg';
    if (tip === 'boy' || tip === 'bas') birim = 'cm';

    document.getElementById('hc-res-bt-fark').innerText = (fark > 0 ? '+' : '') + fark.toFixed(2);
    document.getElementById('hc-res-bt-birim').innerText = birim;
    document.getElementById('hc-res-bt-sure').innerText = sureGun + ' Gün';
    
    let gunlukText = '';
    if (tip === 'kilo') {
        gunlukText = (gunlukHiz * 1000).toFixed(1) + ' gr / gün';
    } else {
        gunlukText = (gunlukHiz * 10).toFixed(1) + ' mm / gün';
    }
    document.getElementById('hc-res-bt-gunluk').innerText = gunlukText;

    const yorumBox = document.getElementById('hc-bt-yorum');
    let yorum = '';
    
    if (fark <= 0) {
        yorum = '<span style="color:var(--hc-front-red)"><strong>Uyarı:</strong> İki ölçüm arasında gelişim gözlenmedi veya azalma var. Lütfen bu durumu doktorunuzla paylaşın.</span>';
    } else {
        yorum = '<span style="color:var(--hc-front-green)"><strong>Bilgi:</strong> Bebeğinizin gelişimi devam ediyor. Bu verileri persentil tablosu ile birlikte değerlendirmeniz önerilir.</span>';
    }

    yorumBox.innerHTML = yorum;
    document.getElementById('hc-bebek-gelisim-takibi-result').classList.add('visible');
}
