function hcDiziİzlemeSüresiHesapla() {
    const episodes = parseFloat(document.getElementById('hc-sr-episodes').value);
    const duration = parseFloat(document.getElementById('hc-sr-duration').value);

    if (!episodes || !duration) return;

    const totalMinutes = episodes * duration;
    const days = Math.floor(totalMinutes / (24 * 60));
    const hours = Math.floor((totalMinutes % (24 * 60)) / 60);
    const mins = totalMinutes % 60;

    let res = "";
    if (days > 0) res += days + " Gün ";
    if (hours > 0) res += hours + " Saat ";
    res += mins + " Dakika";

    document.getElementById('hc-sr-val').innerText = res;
    document.getElementById('hc-sr-result').classList.add('visible');
}
