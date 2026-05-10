function hcHrZonesHesapla() {
    const age = parseInt(document.getElementById('hc-hz-age').value);
    const restHr = parseInt(document.getElementById('hc-hz-rest').value);

    if (!age || !restHr) {
        alert('Lütfen bilgileri giriniz.');
        return;
    }

    const maxHr = 220 - age;
    const hrr = maxHr - restHr;

    const zones = [
        { name: "Z1", desc: "Isınma / Toparlanma", low: 0.50, high: 0.60 },
        { name: "Z2", desc: "Aerobik / Yağ Yakımı", low: 0.60, high: 0.70 },
        { name: "Z3", desc: "Dayanıklılık / Tempo", low: 0.70, high: 0.80 },
        { name: "Z4", desc: "Laktat Eşiği", low: 0.80, high: 0.90 },
        { name: "Z5", desc: "Maksimum Performans", low: 0.90, high: 1.00 }
    ];

    let html = "";
    zones.forEach(z => {
        const min = Math.round((hrr * z.low) + restHr);
        const max = Math.round((hrr * z.high) + restHr);
        html += `<tr>
            <td><strong>${z.name}</strong></td>
            <td>${z.desc}</td>
            <td>${min} - ${max} BPM</td>
        </tr>`;
    });

    document.getElementById('hc-hz-tbody').innerHTML = html;
    document.getElementById('hc-hr-zones-result').classList.add('visible');
}
