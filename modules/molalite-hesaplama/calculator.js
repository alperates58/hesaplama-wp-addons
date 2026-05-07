function hcMolaliteHesapla() {
    const soluteMols = parseFloat(document.getElementById('hc-solute-mols').value);
    const solventGrams = parseFloat(document.getElementById('hc-solvent-mass').value);

    if (isNaN(soluteMols) || isNaN(solventGrams) || soluteMols <= 0 || solventGrams <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Gram -> Kilogram dönüşümü
    const solventKg = solventGrams / 1000;

    // m = mol / kg
    const molality = soluteMols / solventKg;

    document.getElementById('hc-res-molalite-val').innerText = molality.toLocaleString('tr-TR', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 4 
    });

    document.getElementById('hc-molalite-result').classList.add('visible');
    document.getElementById('hc-molalite-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
