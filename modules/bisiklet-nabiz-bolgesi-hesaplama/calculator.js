function hcHrBikeHesapla() {
    const lthr = parseInt(document.getElementById('hc-hb-lthr').value);

    if (!lthr) {
        alert('Lütfen Laktat Eşik Nabzınızı (LTHR) giriniz.');
        return;
    }

    // Joe Friel's Cycling HR Zones
    const zones = [
        { name: "Zone 1", desc: "Aktif Toparlanma", low: 0, high: 0.81 },
        { name: "Zone 2", desc: "Aerobik Kapasite", low: 0.81, high: 0.89 },
        { name: "Zone 3", desc: "Tempo", low: 0.89, high: 0.93 },
        { name: "Zone 4", desc: "Laktat Eşiği", low: 0.93, high: 0.99 },
        { name: "Zone 5a", desc: "Eşik Üstü", low: 0.99, high: 1.02 },
        { name: "Zone 5b", desc: "Aerobik Kapasite (VO2max)", low: 1.02, high: 1.05 },
        { name: "Zone 5c", desc: "Anaerobik Kapasite", low: 1.05, high: 1.10 }
    ];

    let html = "";
    zones.forEach(z => {
        const min = Math.round(lthr * z.low);
        const max = Math.round(lthr * z.high);
        html += `<tr>
            <td><strong>${z.name}</strong></td>
            <td>${z.desc}</td>
            <td>${min === 0 ? "<" : min} - ${max} BPM</td>
        </tr>`;
    });

    document.getElementById('hc-hb-tbody').innerHTML = html;
    document.getElementById('hc-hr-bike-result').classList.add('visible');
}
