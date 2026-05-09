function hcColdChainHesapla() {
    const ti = parseFloat(document.getElementById('hc-cc-ti').value) || 0;
    const tmax = parseFloat(document.getElementById('hc-cc-tmax').value) || 0;
    const ta = parseFloat(document.getElementById('hc-cc-ta').value) || 0;
    const u = parseFloat(document.getElementById('hc-cc-u').value) || 0.5;

    if (ta <= tmax) {
        document.getElementById('hc-res-cc-val').innerText = 'Sınırsız (Ortam yeterince soğuk)';
        return;
    }

    // Simplified model: time proportional to thermal resistance and temp difference
    // t = constant * (Tmax - Ti) / (U * (Ta - Tmax))
    // constant calibrated for a typical 1m3 box
    const constant = 50; 
    const hours = constant * (tmax - ti) / (u * (ta - tmax));

    document.getElementById('hc-res-cc-val').innerText = Math.max(0, hours).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' saat';
    document.getElementById('hc-cold-chain-result').classList.add('visible');
}
