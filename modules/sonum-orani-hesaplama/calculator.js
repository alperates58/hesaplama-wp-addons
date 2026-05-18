function hcSonumOraniHesapla() {
    var m = parseFloat(document.getElementById('hc-so-m').value);
    var k = parseFloat(document.getElementById('hc-so-k').value);
    var c = parseFloat(document.getElementById('hc-so-c').value);

    if (isNaN(m) || m <= 0) {
        alert('Lütfen geçerli bir kütle değeri girin.');
        return;
    }
    if (isNaN(k) || k <= 0) {
        alert('Lütfen geçerli bir yay katsayısı girin.');
        return;
    }
    if (isNaN(c) || c < 0) {
        alert('Lütfen geçerli bir sönüm katsayısı girin.');
        return;
    }

    // cc = 2 * sqrt(k * m)
    var cc = 2 * Math.sqrt(k * m);
    
    // zeta = c / cc
    var zeta = cc === 0 ? 0 : c / cc;

    var regime = '';
    var desc = '';

    if (zeta === 0) {
        regime = 'Sönümsüz (Undamped)';
        desc = 'Sistemde hiç sönüm yoktur. Sistem bozucu etki sonrasında sonsuza dek başlangıç genliğiyle salınım yapmaya devam eder.';
    } else if (zeta < 1) {
        regime = 'Az Sönümlü (Underdamped)';
        desc = 'Sönüm oranı ζ = ' + zeta.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' olan bu sistem, denge konumuna doğru salınımlar yaparak (genliği azalarak) yavaş yavaş durur. Mühendislik uygulamalarında en sık karşılaşılan titreşim tipidir.';
    } else if (zeta === 1) {
        regime = 'Kritik Sönümlü (Critically Damped)';
        desc = 'Sistem salınım yapmaksızın denge konumuna en hızlı şekilde döner. Kapı kapatıcı mekanizmalar ve araç amortisörleri ideal şartlarda bu rejimde tasarlanır.';
    } else {
        regime = 'Aşırı Sönümlü (Overdamped)';
        desc = 'Sönüm çok yüksektir. Sistem salınım yapmaz fakat denge konumuna geri dönmesi, aşırı viskozite veya sürtünme sebebiyle çok uzun sürer.';
    }

    document.getElementById('hc-so-res-zeta').innerText = zeta.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-so-res-cc').innerText = cc.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N·s/m';
    document.getElementById('hc-so-res-regime').innerText = regime;
    document.getElementById('hc-so-desc').innerText = desc;

    document.getElementById('hc-sonum-orani-hesaplama-result').classList.add('visible');
}
