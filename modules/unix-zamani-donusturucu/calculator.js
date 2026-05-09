function hcUnixToDate() {
    const unix = parseInt(document.getElementById('hc-unix-val').value);
    if (isNaN(unix)) return;
    const date = new Date(unix * 1000);
    const iso = date.toLocaleString('sv-SE').replace(' ', 'T').substring(0, 16);
    document.getElementById('hc-unix-date').value = iso;
    document.getElementById('hc-unix-res-text').innerText = date.toLocaleString('tr-TR');
}

function hcDateToUnix() {
    const dateStr = document.getElementById('hc-unix-date').value;
    if (!dateStr) return;
    const date = new Date(dateStr);
    const unix = Math.floor(date.getTime() / 1000);
    document.getElementById('hc-unix-val').value = unix;
    document.getElementById('hc-unix-res-text').innerText = date.toLocaleString('tr-TR');
}
window.addEventListener('load', hcUnixToDate);
