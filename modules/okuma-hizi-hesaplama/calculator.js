function hcReadingSpeedHesapla() {
    const words = parseInt(document.getElementById('hc-rs-words').value) || 0;
    const mins = parseInt(document.getElementById('hc-rs-min').value) || 0;
    const secs = parseInt(document.getElementById('hc-rs-sec').value) || 0;

    const totalSeconds = (mins * 60) + secs;
    if (totalSeconds === 0) return;

    const wpm = (words / totalSeconds) * 60;

    document.getElementById('hc-res-rs-wpm').innerText = Math.round(wpm) + ' Kelime/Dakika';
    
    let desc = "";
    if (wpm > 400) desc = "Mükemmel / Hızlı Okuyucu";
    else if (wpm > 250) desc = "İyi / Ortalama Üstü";
    else if (wpm > 150) desc = "Normal / Ortalama";
    else desc = "Geliştirilmeli / Yavaş";

    document.getElementById('hc-res-rs-desc').innerText = desc;
    document.getElementById('hc-reading-speed-result').classList.add('visible');
}
