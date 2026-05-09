function hcAudiobookTimeHesapla() {
    const pages = parseInt(document.getElementById('hc-ab-pages').value) || 0;
    const speed = parseFloat(document.getElementById('hc-ab-speed').value) || 1;

    // Normal hız: 1 sayfa ~ 1.66 dakika (250 kelime / 150 wpm)
    const totalMinutes = (pages * 1.66) / speed;
    
    const hours = Math.floor(totalMinutes / 60);
    const mins = Math.round(totalMinutes % 60);

    let res = "";
    if (hours > 0) res += hours + " Saat ";
    res += mins + " Dakika";

    document.getElementById('hc-res-ab-time').innerText = res;
    document.getElementById('hc-audiobook-time-result').classList.add('visible');
}
