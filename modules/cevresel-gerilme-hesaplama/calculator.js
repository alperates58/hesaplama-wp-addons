function hcHoopStressHesapla() {
    const P_bar = parseFloat(document.getElementById('hc-cg-p').value);
    const D = parseFloat(document.getElementById('hc-cg-d').value);
    const t = parseFloat(document.getElementById('hc-cg-t').value);

    if (isNaN(P_bar) || isNaN(D) || isNaN(t) || t <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // P: bar -> MPa (1 bar = 0.1 MPa)
    const P = P_bar * 0.1;

    // sigma = (P * D) / (2 * t)
    const sigma = (P * D) / (2 * t);

    document.getElementById('hc-cg-res-mpa').innerText = sigma.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MPa';
    document.getElementById('hc-cg-res-pa').innerText = sigma.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N/mm²';
    
    document.getElementById('hc-cg-result').classList.add('visible');
}
