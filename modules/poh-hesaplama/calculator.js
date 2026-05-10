function hcpOHHesapla() {
    const ohStr = document.getElementById('hc-poh-oh').value;
    if (!ohStr) return;

    const oh = parseFloat(ohStr);
    const poh = -Math.log10(oh);
    const ph = 14 - poh;

    document.getElementById('hc-poh-val').innerText = poh.toFixed(2);
    document.getElementById('hc-poh-ph').innerHTML = `Eşdeğer <strong>pH:</strong> ${ph.toFixed(2)}`;
    document.getElementById('hc-poh-result').classList.add('visible');
}
