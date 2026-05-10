function hcYüzdeDerişimHesapla() {
    const solute = parseFloat(document.getElementById('hc-pc-solute').value);
    const solvent = parseFloat(document.getElementById('hc-pc-solvent').value);

    if (isNaN(solute) || isNaN(solvent)) return;

    // % = (Çözünen / (Çözünen + Çözücü)) * 100
    const percent = (solute / (solute + solvent)) * 100;

    document.getElementById('hc-pc-val').innerText = '% ' + percent.toFixed(2);
    document.getElementById('hc-pc-result').classList.add('visible');
}
