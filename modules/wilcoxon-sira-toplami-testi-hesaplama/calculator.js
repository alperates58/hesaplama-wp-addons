function hcWilcoxonHesapla() {
    const g1 = document.getElementById('hc-ws-g1').value.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));
    const g2 = document.getElementById('hc-ws-g2').value.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));

    if (g1.length === 0 || g2.length === 0) return;

    const n1 = g1.length;
    const n2 = g2.length;

    // Combine and rank
    const combined = [
        ...g1.map(v => ({ v, g: 1 })),
        ...g2.map(v => ({ v, g: 2 }))
    ].sort((a, b) => a.v - b.v);

    let rankSum1 = 0;
    combined.forEach((item, index) => {
        if (item.g === 1) rankSum1 += (index + 1);
    });

    // U = R1 - (n1 * (n1 + 1) / 2)
    const u1 = rankSum1 - (n1 * (n1 + 1) / 2);
    const u2 = (n1 * n2) - u1;
    const u = Math.min(u1, u2);

    // Normal approximation for Z (if n1, n2 > 8)
    const meanU = (n1 * n2) / 2;
    const sigmaU = Math.sqrt((n1 * n2 * (n1 + n2 + 1)) / 12);
    const z = (u - meanU) / sigmaU;

    document.getElementById('hc-res-ws-u').innerText = u.toFixed(1);
    document.getElementById('hc-res-ws-z').innerText = Math.abs(z).toFixed(4);
    
    const note = document.getElementById('hc-ws-note');
    if (Math.abs(z) > 1.96) {
        note.innerText = "Gruplar arasında anlamlı fark vardır (p < 0.05).";
        note.style.color = "#27ae60";
    } else {
        note.innerText = "Anlamlı bir fark bulunamadı (p >= 0.05).";
        note.style.color = "#c0392b";
    }

    document.getElementById('hc-wilcoxon-result').classList.add('visible');
}
