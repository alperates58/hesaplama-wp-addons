function hcSuPlaniHesapla() {
    const goal = parseFloat(document.getElementById('hc-wp-goal').value);
    const wake = document.getElementById('hc-wp-wake').value;
    const sleep = document.getElementById('hc-wp-sleep').value;

    if (!goal || !wake || !sleep) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const wakeTime = parseTime(wake);
    const sleepTime = parseTime(sleep);
    
    let hours = (sleepTime - wakeTime) / 60;
    if (hours <= 0) hours += 24;

    const interval = 2; // Every 2 hours
    const sessions = Math.floor(hours / interval);
    const amountPerSession = (goal * 1000) / (sessions + 1);

    const tableContainer = document.getElementById('hc-wp-table');
    tableContainer.innerHTML = '<table style="width:100%; border-collapse: collapse;"><thead><tr style="border-bottom: 2px solid #eee;"><th style="text-align:left; padding:8px;">Saat</th><th style="text-align:right; padding:8px;">Miktar</th></tr></thead><tbody id="hc-wp-tbody"></tbody></table>';
    const tbody = document.getElementById('hc-wp-tbody');

    for (let i = 0; i <= sessions; i++) {
        const time = formatTime(wakeTime + (i * interval * 60));
        const tr = document.createElement('tr');
        tr.style.borderBottom = '1px solid #f9f9f9';
        tr.innerHTML = `<td style="padding:8px;">${time}</td><td style="text-align:right; padding:8px;">${Math.round(amountPerSession)} ml</td>`;
        tbody.appendChild(tr);
    }

    document.getElementById('hc-water-plan-result').classList.add('visible');
}

function parseTime(t) {
    const [h, m] = t.split(':').map(Number);
    return h * 60 + m;
}

function formatTime(minutes) {
    let h = Math.floor(minutes / 60) % 24;
    let m = minutes % 60;
    return (h < 10 ? '0' + h : h) + ':' + (m < 10 ? '0' + m : m);
}
