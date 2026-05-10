function hcHrTriHesapla() {
    const age = parseInt(document.getElementById('hc-ht-age-tri').value);
    const restHr = parseInt(document.getElementById('hc-ht-rest-tri').value);

    if (!age || !restHr) {
        alert('Lütfen bilgileri giriniz.');
        return;
    }

    const maxHr = 220 - age;
    const hrr = maxHr - restHr;

    // Triathlon specific targets (general guidelines)
    // Swim: Z2 intensity
    const swimLow = Math.round((hrr * 0.60) + restHr);
    const swimHigh = Math.round((hrr * 0.70) + restHr);

    // Bike: Z2 - Lower Z3 (Ironman pace)
    const bikeLow = Math.round((hrr * 0.65) + restHr);
    const bikeHigh = Math.round((hrr * 0.75) + restHr);

    // Run: Z3 (Ironman pace)
    const runLow = Math.round((hrr * 0.75) + restHr);
    const runHigh = Math.round((hrr * 0.85) + restHr);

    document.getElementById('hc-tri-swim').innerText = `${swimLow} - ${swimHigh} BPM`;
    document.getElementById('hc-tri-bike').innerText = `${bikeLow} - ${bikeHigh} BPM`;
    document.getElementById('hc-tri-run').innerText = `${runLow} - ${runHigh} BPM`;

    document.getElementById('hc-hr-tri-result').classList.add('visible');
}
