function hcMesafeyeGöreSesZayıflamasıHesapla() {
    const d1 = parseFloat(document.getElementById('hc-sa-d1').value);
    const l1 = parseFloat(document.getElementById('hc-sa-l1').value);
    const d2 = parseFloat(document.getElementById('hc-sa-d2').value);

    if (isNaN(d1) || isNaN(l1) || isNaN(d2) || d1 <= 0 || d2 <= 0) {
        alert('Lütfen geçerli ve pozitif mesafe değerleri giriniz.');
        return;
    }

    // L2 = L1 - 20 * log10(d2 / d1)
    const dbLoss = 20 * Math.log10(d2 / d1);
    const l2 = l1 - dbLoss;

    const diff = l1 - l2;

    // Algı yorumlama
    let comment = '';
    if (diff <= 0) {
        comment = 'Ses kaynağına yaklaşıldığı için ses seviyesi arttı.';
    } else if (diff < 3) {
        comment = 'Farkı insan kulağı tarafından neredeyse hiç algılanamaz.';
    } else if (diff >= 3 && diff < 6) {
        comment = 'Güç yarıya indi; insan kulağı çok az bir azalma hisseder.';
    } else if (diff >= 6 && diff < 10) {
        comment = 'Önemli bir düşüş; ses gücü %75 oranında azaldı.';
    } else if (diff >= 10 && diff < 20) {
        comment = 'Ses şiddeti kulağa yarı yarıya (50% daha az) geliyor gibi algılanır.';
    } else {
        comment = 'Çok ciddi bir zayıflama; ses şiddeti 1/4\'ten daha az olarak algılanır (fısıltı veya duyulamaz hale gelebilir).';
    }

    document.getElementById('hc-sa-l2-val').innerText = l2.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' dB';
    document.getElementById('hc-sa-diff-val').innerText = dbLoss.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' dB azaldı';
    document.getElementById('hc-sa-comment-val').innerText = comment;

    document.getElementById('hc-mesafeye-gore-ses-zayiflamasi-result').classList.add('visible');
}
