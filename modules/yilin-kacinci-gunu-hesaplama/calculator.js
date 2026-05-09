function hcYilinGunuHesapla() {
    const dateVal = document.getElementById('hc-ykg-date').value;
    if (!dateVal) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateVal);
    const start = new Date(date.getFullYear(), 0, 0);
    const diff = date - start;
    const oneDay = 1000 * 60 * 60 * 24;
    const dayOfYear = Math.floor(diff / oneDay);

    const isLeap = (year) => (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
    const totalDays = isLeap(date.getFullYear()) ? 366 : 365;
    const remaining = totalDays - dayOfYear;

    document.getElementById('hc-ykg-val').innerText = dayOfYear + ". gün";
    document.getElementById('hc-ykg-remain').innerText = remaining + " gün kaldı";
    document.getElementById('hc-ykg-result').classList.add('visible');
}
