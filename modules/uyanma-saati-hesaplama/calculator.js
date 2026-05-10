function hcUyanmaSaatiHesapla() {
    const sleepStr = document.getElementById('hc-ua-sleep').value;
    if (!sleepStr) return;

    const resList = document.getElementById('hc-ua-res-list');
    resList.innerHTML = '';

    const sleepTime = new Date('2026-01-01T' + sleepStr);
    const cycles = [4, 5, 6];

    cycles.forEach(c => {
        const wakeTime = new Date(sleepTime.getTime() + (c * 90 * 60000) + (15 * 60000));
        const timeStr = wakeTime.getHours().toString().padStart(2, '0') + ':' + wakeTime.getMinutes().toString().padStart(2, '0');
        
        const item = document.createElement('div');
        item.className = 'hc-ua-item' + (c >= 5 ? ' best' : '');
        item.innerHTML = `
            <strong>${timeStr}</strong>
            <span>${c} Döngü (${c * 1.5} saat uyku)</span>
        `;
        resList.appendChild(item);
    });

    document.getElementById('hc-uyanma-saati-result').classList.add('visible');
}
