function hcKuvvetliAsitpHHesapla() {
    const conc = parseFloat(document.getElementById('hc-sa-conc').value);
    const valency = parseFloat(document.getElementById('hc-sa-valency').value);

    if (!conc || !valency) return;

    // [H+] = Molarite * Tesir Değerliği
    const hPlus = conc * valency;
    const ph = -Math.log10(hPlus);
    const poh = 14 - ph;

    document.getElementById('hc-sa-stats').innerHTML = `
        🧪 <strong>[H⁺] Derişimi:</strong> ${hPlus.toExponential(4)} M<br>
        🎯 <strong>pH:</strong> ${ph.toFixed(2)}<br>
        💧 <strong>pOH:</strong> ${poh.toFixed(2)}
    `;
    document.getElementById('hc-sa-result').classList.add('visible');
}
