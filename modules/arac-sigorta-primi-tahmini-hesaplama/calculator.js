function hcSigHesapla() {
    const val = parseFloat(document.getElementById('hc-sig-value').value);
    const age = parseInt(document.getElementById('hc-sig-age').value);
    const step = parseInt(document.getElementById('hc-sig-no-claim').value);

    if (isNaN(val)) {
        alert('Lütfen araç değerini girin.');
        return;
    }

    // Heuristic Multipliers
    let baseKaskoRate = 0.025; // 2.5%
    let baseTrafik = 8000;

    // Age effect
    if (age < 25) { baseKaskoRate *= 1.3; baseTrafik *= 1.4; }
    else if (age > 60) { baseKaskoRate *= 1.1; baseTrafik *= 1.1; }

    // No claim step effect (4 is neutral)
    const stepEffect = [1.5, 1.3, 1.2, 1.1, 1.0, 0.8, 0.6, 0.4];
    const multiplier = stepEffect[step] || 1.0;

    const kasko = val * baseKaskoRate * multiplier;
    const trafik = baseTrafik * multiplier;

    document.getElementById('hc-sig-kasko').innerText = kasko.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    document.getElementById('hc-sig-trafik').innerText = trafik.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";

    document.getElementById('hc-sig-result').classList.add('visible');
}
