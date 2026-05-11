function hcStressCalcHesapla() {
    const f = parseFloat(document.getElementById('hc-st-f').value);
    const a = parseFloat(document.getElementById('hc-st-a').value);

    if (isNaN(f) || isNaN(a) || a <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // sigma = F / A. 1 N/mm2 = 1 MPa.
    const stress = f / a;

    document.getElementById('hc-st-res-val').innerText = stress.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MPa';
    
    document.getElementById('hc-st-result').classList.add('visible');
}
