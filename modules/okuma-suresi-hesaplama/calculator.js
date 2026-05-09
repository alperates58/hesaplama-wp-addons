function hcReadingTimeHesapla() {
    const pages = parseInt(document.getElementById('hc-read-pages').value) || 0;
    const speed = parseInt(document.getElementById('hc-read-speed').value) || 250;

    const totalWords = pages * 300;
    const totalMinutes = totalWords / speed;

    const hours = Math.floor(totalMinutes / 60);
    const mins = Math.round(totalMinutes % 60);

    let res = "";
    if (hours > 0) res += hours + " Saat ";
    res += mins + " Dakika";

    document.getElementById('hc-res-read-time').innerText = res;
    document.getElementById('hc-reading-time-result').classList.add('visible');
}
