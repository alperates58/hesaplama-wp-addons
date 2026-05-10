function hcSTPHesapla() {
    const mol = parseFloat(document.getElementById('hc-stp-mol').value);

    if (!mol) return;

    // STP: 0 C, 1 atm -> 22.414 L/mol
    // SATP: 25 C, 1 bar (0.987 atm) -> 24.789 L/mol
    
    const vSTP = mol * 22.414;
    const vSATP = mol * 24.789;

    document.getElementById('hc-stp-stats').innerHTML = `
        ❄️ <strong>STP Hacmi (0°C, 1 atm):</strong> ${vSTP.toFixed(3)} L<br>
        🌡️ <strong>SATP Hacmi (25°C, 1 bar):</strong> ${vSATP.toFixed(3)} L
    `;
    document.getElementById('hc-stp-result').classList.add('visible');
}
