function hcKütleceYüzdeHesapla() {
    const solute = parseFloat(document.getElementById('hc-mp-solute').value);
    const solvent = parseFloat(document.getElementById('hc-mp-solvent').value);

    if (isNaN(solute) || isNaN(solvent)) return;

    // % w/w = (çözünen / (çözünen + çözücü)) * 100
    const total = solute + solvent;
    if (total === 0) return;

    const percent = (solute / total) * 100;

    document.getElementById('hc-mp-val').innerText = '% ' + percent.toFixed(2);
    document.getElementById('hc-mp-result').classList.add('visible');
}
