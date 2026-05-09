function hcMesaiHesapla() {
    const start = document.getElementById('hc-ms-start').value;
    const end = document.getElementById('hc-ms-end').value;
    const breakMins = parseInt(document.getElementById('hc-ms-break').value) || 0;
    const stdHours = parseFloat(document.getElementById('hc-ms-std').value) || 0;

    if (!start || !end) {
        alert('Lütfen giriş ve çıkış saatlerini seçin.');
        return;
    }

    const [h1, m1] = start.split(':').map(Number);
    const [h2, m2] = end.split(':').map(Number);

    let diffMinutes = (h2 * 60 + m2) - (h1 * 60 + m1);
    if (diffMinutes < 0) diffMinutes += 1440;

    const netWorkMinutes = diffMinutes - breakMins;
    const netWorkHours = netWorkMinutes / 60;

    const extraHours = Math.max(0, netWorkHours - stdHours);

    document.getElementById('hc-ms-total').innerText = netWorkHours.toFixed(2) + " Saat";
    document.getElementById('hc-ms-extra').innerText = extraHours.toFixed(2) + " Saat";
    document.getElementById('hc-ms-result').classList.add('visible');
}
