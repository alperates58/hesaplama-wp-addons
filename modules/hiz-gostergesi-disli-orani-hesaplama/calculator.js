function hcSgHesapla() {
    const drive = parseFloat(document.getElementById('hc-sg-drive').value);
    const axle = parseFloat(document.getElementById('hc-sg-axle').value);
    const revs = parseFloat(document.getElementById('hc-sg-revs').value);

    if (isNaN(drive) || isNaN(axle) || isNaN(revs)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Formula: (Drive * Axle * RevsPerMile) / 1000
    // RevsPerMile = RevsPerKm * 1.60934
    const driven = (drive * axle * revs * 1.60934) / 1000;

    document.getElementById('hc-sg-val').innerText = driven.toFixed(1) + " Diş";
    document.getElementById('hc-sg-result').classList.add('visible');
}
