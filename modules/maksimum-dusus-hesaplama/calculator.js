function hcMaksimumDususHesapla() {
    const peak = parseFloat(document.getElementById('hc-mdd-peak').value);
    const trough = parseFloat(document.getElementById('hc-mdd-trough').value);

    if (isNaN(peak) || isNaN(trough) || peak <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (trough > peak) {
        alert('Dip değer zirve değerden büyük olamaz.');
        return;
    }

    // MDD = (Peak - Trough) / Peak
    const mdd = (peak - trough) / peak;
    const mddPercentage = mdd * 100;

    document.getElementById('hc-mdd-value').innerText = '%' + mddPercentage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-mdd-result').classList.add('visible');
}
