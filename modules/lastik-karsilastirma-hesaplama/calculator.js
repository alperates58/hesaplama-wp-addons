function hcTc2Hesapla() {
    const getDia = (w, r, d) => (w * r / 50) + (d * 25.4);
    
    const d1 = getDia(
        parseFloat(document.getElementById('hc-tc2-w1').value),
        parseFloat(document.getElementById('hc-tc2-r1').value),
        parseFloat(document.getElementById('hc-tc2-d1').value)
    );
    const d2 = getDia(
        parseFloat(document.getElementById('hc-tc2-w2').value),
        parseFloat(document.getElementById('hc-tc2-r2').value),
        parseFloat(document.getElementById('hc-tc2-d2').value)
    );

    if (isNaN(d1) || isNaN(d2)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const diff = ((d2 - d1) / d1) * 100;
    var severity = Math.abs(diff) > 3 ? 'danger' : 'success';

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('lastik-karsilastirma-hesaplama', {
        diff: (diff > 0 ? '+' : '') + diff.toFixed(2) + '%',
        d1: d1.toFixed(1),
        d2: d2.toFixed(1),
        dDiff: (d2 - d1).toFixed(1),
        severity: severity,
        metadata: {
            badges: ['Otomotiv & Trafik', 'Güvenlik Standardı']
        }
    })) {
        return;
    }

    document.getElementById('hc-tc2-val').innerText = diff.toFixed(2) + "%";
    document.getElementById('hc-tc2-result').classList.add('visible');
}
