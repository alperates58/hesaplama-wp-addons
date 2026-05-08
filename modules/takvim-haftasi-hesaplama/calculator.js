function hcHaftaNoHesapla() {
    const dVal = document.getElementById('hc-thw-date').value;
    if (!dVal) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dVal);
    date.setHours(0, 0, 0, 0);
    // Thursday in current week decides the year.
    date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
    // January 4th is always in week 1.
    const week1 = new Date(date.getFullYear(), 0, 4);
    // Adjust to Thursday in week 1 and count number of weeks from date to week1.
    const weekNo = 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000 - 3 + (week1.getDay() + 6) % 7) / 7);

    document.getElementById('hc-thw-val').innerText = weekNo + ". Hafta";
    document.getElementById('hc-thw-result').classList.add('visible');
}
