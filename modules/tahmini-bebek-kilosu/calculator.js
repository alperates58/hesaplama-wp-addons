function hcEFWHesapla() {
    const acMm = parseFloat(document.getElementById('hc-efw-ac').value);
    const flMm = parseFloat(document.getElementById('hc-efw-fl').value);

    if (isNaN(acMm) || isNaN(flMm)) {
        alert('Lütfen ölçümleri girin.');
        return;
    }

    const ac = acMm / 10; // to cm
    const fl = flMm / 10; // to cm

    // Hadlock Formula: Log10(EFW) = 1.304 + 0.05281(AC) + 0.1938(FL) - 0.004(AC*FL)
    const logEFW = 1.304 + (0.05281 * ac) + (0.1938 * fl) - (0.004 * ac * fl);
    const efw = Math.pow(10, logEFW);

    document.getElementById('hc-efw-val').innerText = Math.round(efw).toLocaleString('tr-TR') + " gram";
    document.getElementById('hc-efw-result').classList.add('visible');
}
