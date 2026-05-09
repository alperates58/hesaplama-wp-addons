function hcCRLHesapla() {
    const mm = parseFloat(document.getElementById('hc-crl-mm').value);

    if (isNaN(mm) || mm <= 0) {
        alert('Lütfen geçerli bir CRL ölçüsü girin.');
        return;
    }

    // Formula: Weeks = (CRL in cm + 6.5)
    // GA (weeks) = (mm/10 + 6.5)
    const weeksTotal = (mm / 10) + 6.5;
    const w = Math.floor(weeksTotal);
    const d = Math.round((weeksTotal - w) * 7);

    document.getElementById('hc-crl-value').innerText = w + " Hafta " + d + " Gün";
    document.getElementById('hc-crl-ga-result').classList.add('visible');
}
