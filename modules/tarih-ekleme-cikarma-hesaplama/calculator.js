function hcTarihEkleCikar() {
    const dateVal = document.getElementById('hc-tec-date').value;
    const amount = parseInt(document.getElementById('hc-tec-val').value) || 0;
    const unit = document.getElementById('hc-tec-unit').value;
    const op = document.getElementById('hc-tec-op').value;

    if (!dateVal) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateVal);
    const multiplier = (op === 'add' ? 1 : -1);

    if (unit === 'days') {
        date.setDate(date.getDate() + amount * multiplier);
    } else if (unit === 'weeks') {
        date.setDate(date.getDate() + (amount * 7) * multiplier);
    } else if (unit === 'months') {
        date.setMonth(date.getMonth() + amount * multiplier);
    } else if (unit === 'years') {
        date.setFullYear(date.getFullYear() + amount * multiplier);
    }

    const result = date.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-tec-res-val').innerText = result;
    document.getElementById('hc-tec-result').classList.add('visible');
}
