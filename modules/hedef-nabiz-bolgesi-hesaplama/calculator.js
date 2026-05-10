function hcHedefNabızBölgesiHesapla() {
    const age = parseFloat(document.getElementById('hc-hz-age').value);
    if (!age) return;

    // Max HR = 220 - Age
    const mhr = 220 - age;

    const zones = [
        { name: "Isınma (%50-60)", low: 0.5, high: 0.6, color: "#95a5a6" },
        { name: "Yağ Yakımı (%60-70)", low: 0.6, high: 0.7, color: "#27ae60" },
        { name: "Aerobik (%70-80)", low: 0.7, high: 0.8, color: "#2980b9" },
        { name: "Anaerobik (%80-90)", low: 0.8, high: 0.9, color: "#e67e22" },
        { name: "Maksimum Efor (%90-100)", low: 0.9, high: 1.0, color: "#c0392b" }
    ];

    let output = `Maksimum Nabız (MHR): <strong>${mhr}</strong> bpm<br><br>`;
    zones.forEach(z => {
        const l = Math.round(mhr * z.low);
        const h = Math.round(mhr * z.high);
        output += `<div style="margin-bottom:8px;"><span style="color:${z.color}; font-weight:bold;">${z.name}:</span> ${l} - ${h} bpm</div>`;
    });

    document.getElementById('hc-hz-stats').innerHTML = output;
    document.getElementById('hc-hz-result').classList.add('visible');
}
