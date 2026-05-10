function hcYanmaTepkimesiHesapla() {
    const x = parseFloat(document.getElementById('hc-ct-x').value);
    const y = parseFloat(document.getElementById('hc-ct-y').value);

    if (!x || !y) return;

    // CxHy + (x + y/4) O2 -> x CO2 + (y/2) H2O
    const o2Coeff = x + (y / 4);
    const co2Coeff = x;
    const h2oCoeff = y / 2;

    document.getElementById('hc-ct-stats').innerHTML = `
        🔥 <strong>Denkleşmiş Tepkime:</strong><br>
        C<sub>${x}</sub>H<sub>${y}</sub> + <strong>${o2Coeff}</strong> O<sub>2</sub> ➔ 
        <strong>${co2Coeff}</strong> CO<sub>2</sub> + <strong>${h2oCoeff}</strong> H<sub>2</sub>O
    `;
    document.getElementById('hc-ct-result').classList.add('visible');
}
