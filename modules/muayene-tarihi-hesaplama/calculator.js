function hcMthHesapla() {
    const yearsToAdd = parseInt(document.getElementById('hc-mth-type').value);
    const lastDateVal = document.getElementById('hc-mth-last-date').value;

    if (!lastDateVal) {
        alert('Lütfen tarih seçin.');
        return;
    }

    const lastDate = new Date(lastDateVal);
    const nextDate = new Date(lastDate);
    nextDate.setFullYear(lastDate.getFullYear() + yearsToAdd);

    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('hc-mth-val').innerText = nextDate.toLocaleDateString('tr-TR', options);
    document.getElementById('hc-mth-result').classList.add('visible');
}
