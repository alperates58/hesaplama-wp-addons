function hcShearStrainHesapla() {
    const dx = parseFloat(document.getElementById('hc-sn-dx').value);
    const l = parseFloat(document.getElementById('hc-sn-l').value);

    if (isNaN(dx) || isNaN(l) || l <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // gamma = dx / l
    const gamma = dx / l;

    document.getElementById('hc-sn-res-val').innerText = gamma.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' rad';
    
    document.getElementById('hc-sn-result').classList.add('visible');
}
