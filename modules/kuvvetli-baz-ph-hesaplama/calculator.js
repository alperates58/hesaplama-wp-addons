function hcKuvvetliBazpHHesapla() {
    const conc = parseFloat(document.getElementById('hc-sb-conc').value);
    const valency = parseFloat(document.getElementById('hc-sb-valency').value);

    if (!conc || !valency) return;

    // [OH-] = Molarite * Tesir Değerliği
    const ohMinus = conc * valency;
    const poh = -Math.log10(ohMinus);
    const ph = 14 - poh;

    document.getElementById('hc-sb-stats').innerHTML = `
        🧪 <strong>[OH⁻] Derişimi:</strong> ${ohMinus.toExponential(4)} M<br>
        🎯 <strong>pOH:</strong> ${poh.toFixed(2)}<br>
        💧 <strong>pH:</strong> ${ph.toFixed(2)}
    `;
    document.getElementById('hc-sb-result').classList.add('visible');
}
