function hcWakePlanHesapla() {
    const sleepStr = document.getElementById('hc-wp-sleep').value;
    if (!sleepStr) return;

    const resList = document.getElementById('hc-wp-res-list');
    resList.innerHTML = '';

    const sleepTime = new Date('2026-01-01T' + sleepStr);
    const options = [5, 6]; // Most common healthy cycle counts

    options.forEach(c => {
        const wakeTime = new Date(sleepTime.getTime() + (c * 90 * 60000) + (15 * 60000));
        const timeStr = wakeTime.getHours().toString().padStart(2, '0') + ':' + wakeTime.getMinutes().toString().padStart(2, '0');
        
        const div = document.createElement('div');
        div.className = 'hc-wp-item';
        div.innerHTML = `
            <strong>${timeStr}</strong>
            <span>${c} Döngü (${c * 1.5} Saat Uyku)</span>
        `;
        resList.appendChild(div);
    });

    document.getElementById('hc-wake-plan-result').classList.add('visible');
}
