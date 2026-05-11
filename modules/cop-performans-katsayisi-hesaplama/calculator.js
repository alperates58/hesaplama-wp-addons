function hcCopHesapla() {
    const Q = parseFloat(document.getElementById('hc-cop-q').value);
    const W = parseFloat(document.getElementById('hc-cop-w').value);

    if (isNaN(Q) || isNaN(W) || W <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // COP = Q / W
    const cop = Q / W;
    const eer = cop * 3.412;

    document.getElementById('hc-cop-res-val').innerText = cop.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-cop-res-eer').innerText = 'EER (BTU/Wh): ' + eer.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-cop-result').classList.add('visible');
}
