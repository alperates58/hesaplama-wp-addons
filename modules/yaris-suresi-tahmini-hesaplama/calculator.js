function hcRacePredHesapla() {
    const d1 = parseFloat(document.getElementById('hc-rp-dist-ref').value);
    const hr = parseInt(document.getElementById('hc-rp-hr').value || 0);
    const min = parseInt(document.getElementById('hc-rp-min').value || 0);
    const sec = parseInt(document.getElementById('hc-rp-sec').value || 0);

    if (!hr && !min && !sec) {
        alert('Lütfen referans sürenizi giriniz.');
        return;
    }

    const t1 = (hr * 3600) + (min * 60) + sec;
    const targets = [
        { name: "5K", d2: 5 },
        { name: "10K", d2: 10 },
        { name: "Yarı Maraton", d2: 21.097 },
        { name: "Maraton", d2: 42.195 }
    ];

    let html = "";
    targets.forEach(t => {
        // Riegel's Formula: T2 = T1 * (D2 / D1)^1.06
        const t2 = t1 * Math.pow(t.d2 / d1, 1.06);
        
        const h = Math.floor(t2 / 3600);
        const m = Math.floor((t2 % 3600) / 60);
        const s = Math.round(t2 % 60);
        
        const timeStr = (h > 0 ? h + ":" : "") + (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s);
        html += `<tr><td>${t.name}</td><td><strong>${timeStr}</strong></td></tr>`;
    });

    document.getElementById('hc-rp-tbody').innerHTML = html;
    document.getElementById('hc-race-pred-result').classList.add('visible');
}
