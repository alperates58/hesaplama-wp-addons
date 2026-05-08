function hcKpssGetNet(dId, yId) {
    const d = parseInt(document.getElementById(dId).value) || 0;
    const y = parseInt(document.getElementById(yId).value) || 0;
    return Math.max(0, d - (y / 4));
}

function hcKpssHesapla() {
    const gy = hcKpssGetNet('hc-kpss-gy', 'hc-kpss-gy-y');
    const gk = hcKpssGetNet('hc-kpss-gk', 'hc-kpss-gk-y');
    const eb = hcKpssGetNet('hc-kpss-eb', 'hc-kpss-eb-y');

    // Tahmini Katsayılar (2026)
    const baseP3 = 48.5;
    const p3 = baseP3 + (gy * 0.45) + (gk * 0.45);
    
    const baseP93 = 45.0; // Ön Lisans tahmini
    const p93 = baseP93 + (gy * 0.48) + (gk * 0.48);

    const baseP94 = 42.0; // Ortaöğretim tahmini
    const p94 = baseP94 + (gy * 0.5) + (gk * 0.5);

    const baseP10 = 40.0;
    const p10 = baseP10 + (gy * 0.3) + (gk * 0.3) + (eb * 0.4);

    document.getElementById('hc-kpss-res-p3').innerText = Math.min(100, p3).toFixed(3);
    document.getElementById('hc-kpss-res-p93').innerText = Math.min(100, p93).toFixed(3);
    document.getElementById('hc-kpss-res-p94').innerText = Math.min(100, p94).toFixed(3);
    document.getElementById('hc-kpss-res-p10').innerText = Math.min(100, p10).toFixed(3);

    document.getElementById('hc-kpss-result').classList.add('visible');
}
