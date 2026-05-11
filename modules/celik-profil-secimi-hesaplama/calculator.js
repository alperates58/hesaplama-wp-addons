function hcCelikProfilHesapla() {
    const L = parseFloat(document.getElementById('hc-cp-l').value); // m
    const q = parseFloat(document.getElementById('hc-cp-q').value); // kN/m
    const sigma = parseFloat(document.getElementById('hc-cp-sigma').value); // kN/cm2

    if (isNaN(L) || isNaN(q) || L <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Basit kiriş için Maksimum Moment: M = q * L^2 / 8 (kNm)
    const Mmax = (q * Math.pow(L, 2)) / 8; // kNm
    
    // Wx = M / sigma
    // 1 kNm = 100 kNcm
    const Mmax_cm = Mmax * 100; // kNcm
    const Wx = Mmax_cm / sigma; // cm3

    document.getElementById('hc-cp-res-wx').innerText = Wx.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' cm³';
    document.getElementById('hc-cp-res-mmax').innerText = 'Maks. Moment (Mmax): ' + Mmax.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kNm';
    
    document.getElementById('hc-cp-result').classList.add('visible');
}
