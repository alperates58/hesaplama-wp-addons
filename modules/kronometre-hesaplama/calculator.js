let hcKrStartTime, hcKrElapsedTime = 0, hcKrTimerInterval;
let hcKrLaps = [];

function hcKronStart() {
    const btn = document.getElementById('hc-kr-start');
    if (btn.innerText === "Başlat" || btn.innerText === "Devam Et") {
        hcKrStartTime = Date.now() - hcKrElapsedTime;
        hcKrTimerInterval = setInterval(hcKronUpdate, 10);
        btn.innerText = "Durdur";
        btn.style.background = "#f39c12";
    } else {
        clearInterval(hcKrTimerInterval);
        btn.innerText = "Devam Et";
        btn.style.background = "var(--hc-front-blue)";
    }
}

function hcKronUpdate() {
    hcKrElapsedTime = Date.now() - hcKrStartTime;
    document.getElementById('hc-kr-display').innerText = hcKronFormatTime(hcKrElapsedTime);
}

function hcKronFormatTime(ms) {
    let h = Math.floor(ms / 3600000);
    let m = Math.floor((ms % 3600000) / 60000);
    let s = Math.floor((ms % 60000) / 1000);
    let cs = Math.floor((ms % 1000) / 10);
    return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}.${cs.toString().padStart(2, '0')}`;
}

function hcKronLap() {
    if (hcKrElapsedTime === 0) return;
    hcKrLaps.unshift(hcKronFormatTime(hcKrElapsedTime));
    let html = "<h4>Turlar</h4>";
    hcKrLaps.forEach((lap, i) => {
        html += `<div style="padding: 5px; border-bottom: 1px solid #eee;">${hcKrLaps.length - i}. Tur: ${lap}</div>`;
    });
    document.getElementById('hc-kr-laps').innerHTML = html;
}

function hcKronReset() {
    clearInterval(hcKrTimerInterval);
    hcKrElapsedTime = 0;
    hcKrLaps = [];
    document.getElementById('hc-kr-display').innerText = "00:00:00.00";
    document.getElementById('hc-kr-laps').innerHTML = "";
    document.getElementById('hc-kr-start').innerText = "Başlat";
    document.getElementById('hc-kr-start').style.background = "var(--hc-front-blue)";
}
