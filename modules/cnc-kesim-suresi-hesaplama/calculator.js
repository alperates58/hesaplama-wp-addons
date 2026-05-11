function hcCncSüreHesapla() {
    const L = parseFloat(document.getElementById('hc-cnc-l').value);
    const f = parseFloat(document.getElementById('hc-cnc-f').value);
    const h = parseFloat(document.getElementById('hc-cnc-h').value) || 0;

    if (isNaN(L) || isNaN(f) || f <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // t = (L / f) + h
    const kesimDakika = L / f;
    const toplamDakika = kesimDakika + h;
    
    const dk = Math.floor(toplamDakika);
    const sn = Math.round((toplamDakika - dk) * 60);

    document.getElementById('hc-cnc-res-val').innerText = dk + ' dk ' + sn + ' sn';
    document.getElementById('hc-cnc-res-dec').innerText = 'Toplam: ' + toplamDakika.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dk';
    
    document.getElementById('hc-cnc-result').classList.add('visible');
}
