function hcHydSlopeHesapla() {
    const h = parseFloat(document.getElementById('hc-hs-h').value);
    const l = parseFloat(document.getElementById('hc-hs-l').value);

    if (isNaN(h) || isNaN(l) || l <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // S = h / l
    const s = h / l;

    document.getElementById('hc-hs-res-val').innerText = s.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-hs-res-perc').innerText = '%' + (s * 100).toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-hs-result').classList.add('visible');
}
