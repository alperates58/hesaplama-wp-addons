function hcTrainPaceHesapla() {
    const min = parseInt(document.getElementById('hc-tp-min').value || 0);
    const sec = parseInt(document.getElementById('hc-tp-sec').value || 0);

    if (!min && !sec) {
        alert('Lütfen güncel 5K sürenizi giriniz.');
        return;
    }

    const currentPace = (min + (sec / 60)) / 5; // dk/km

    const formats = [
        { name: "Kolay Koşu (Easy)", mult: 1.25 },
        { name: "Maraton Temposu", mult: 1.10 },
        { name: "Eşik Koşusu (Tempo)", mult: 1.05 },
        { name: "Interval (1km)", mult: 0.95 },
        { name: "Tekrar (400m)", mult: 0.90 }
    ];

    let html = "";
    formats.forEach(f => {
        const paceDec = currentPace * f.mult;
        const pMin = Math.floor(paceDec);
        const pSec = Math.round((paceDec - pMin) * 60);
        html += `<tr><td>${f.name}</td><td><strong>${pMin}:${pSec < 10 ? '0' + pSec : pSec}</strong></td></tr>`;
    });

    document.getElementById('hc-tp-tbody').innerHTML = html;
    document.getElementById('hc-train-pace-result').classList.add('visible');
}
