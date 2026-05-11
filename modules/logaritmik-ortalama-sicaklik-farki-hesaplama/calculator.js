function hcLmtdHesapla() {
    const thin = parseFloat(document.getElementById('hc-lm-thin').value);
    const thout = parseFloat(document.getElementById('hc-lm-thout').value);
    const tcin = parseFloat(document.getElementById('hc-lm-tcin').value);
    const tcout = parseFloat(document.getElementById('hc-lm-tcout').value);
    const flow = document.getElementById('hc-lm-flow').value;

    if (isNaN(thin) || isNaN(thout) || isNaN(tcin) || isNaN(tcout)) {
        alert('Lütfen tüm sıcaklık değerlerini girin.');
        return;
    }

    let dt1, dt2;
    if (flow === 'counter') {
        dt1 = thin - tcout;
        dt2 = thout - tcin;
    } else {
        dt1 = thin - tcin;
        dt2 = thout - tcout;
    }

    if (dt1 <= 0 || dt2 <= 0) {
        alert('Sıcaklık farkları sıfırdan büyük olmalıdır. Giriş/çıkış değerlerini kontrol edin.');
        return;
    }

    let lmtd = 0;
    if (Math.abs(dt1 - dt2) < 1e-6) {
        lmtd = dt1; // Simple average if they are same
    } else {
        // LMTD = (dt1 - dt2) / ln(dt1 / dt2)
        lmtd = (dt1 - dt2) / Math.log(dt1 / dt2);
    }

    document.getElementById('hc-lm-res-val').innerText = lmtd.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' K';
    
    document.getElementById('hc-lm-result').classList.add('visible');
}
