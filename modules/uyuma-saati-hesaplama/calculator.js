function hcUyumaSaatiHesapla() {
    const wakeStr = document.getElementById('hc-uy-wake').value;
    if (!wakeStr) return;

    const resList = document.getElementById('hc-uy-res-list');
    resList.innerHTML = '';

    const wakeTime = new Date('2026-01-02T' + wakeStr);
    const cycles = [6, 5, 4]; // Recommended cycle counts

    cycles.forEach(c => {
        const sleepTime = new Date(wakeTime.getTime() - (c * 90 * 60000) - (15 * 60000));
        const timeStr = sleepTime.getHours().toString().padStart(2, '0') + ':' + sleepTime.getMinutes().toString().padStart(2, '0');
        
        const item = document.createElement('div');
        item.className = 'hc-uy-item' + (c === 6 || c === 5 ? ' best' : '');
        item.innerHTML = `
            <strong>${timeStr}</strong>
            <span>${c} Döngü (${c * 1.5} saat uyku)</span>
        `;
        resList.appendChild(item);
    });

    document.getElementById('hc-uyuma-saati-result').classList.add('visible');
}
