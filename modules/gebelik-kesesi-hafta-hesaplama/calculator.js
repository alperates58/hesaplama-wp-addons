function hcGSDHesapla() {
    const mm = parseFloat(document.getElementById('hc-gs-mm').value);

    if (isNaN(mm) || mm <= 0) {
        alert('Lütfen geçerli bir ölçü girin.');
        return;
    }

    // Formula: Gestational Age (days) = MSD (mm) + 30
    const totalDays = mm + 30;
    const w = Math.floor(totalDays / 7);
    const d = Math.round(totalDays % 7);

    document.getElementById('hc-gs-value').innerText = w + " Hafta " + d + " Gün";
    document.getElementById('hc-gsd-ga-result').classList.add('visible');
}
