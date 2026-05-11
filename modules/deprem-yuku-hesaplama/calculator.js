function hcDepremYukuHesapla() {
    const W = parseFloat(document.getElementById('hc-dy-w').value);
    const Sds = parseFloat(document.getElementById('hc-dy-sds').value);
    const I = parseFloat(document.getElementById('hc-dy-i').value);
    const R = parseFloat(document.getElementById('hc-dy-r').value);

    if (isNaN(W) || isNaN(Sds) || isNaN(R) || R <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Vt = W * Sds / (R / I)
    // TBDY 2018 simplified base shear for ELF method
    const Vt = W * Sds / (R / I);

    document.getElementById('hc-dy-res-vt').innerText = Math.round(Vt).toLocaleString('tr-TR') + ' kN';
    document.getElementById('hc-dy-res-ratio').innerText = 'Bina ağırlığının %' + ((Vt / W) * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kadarı';
    
    document.getElementById('hc-dy-result').classList.add('visible');
}
