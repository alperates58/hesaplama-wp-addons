function hcWakeCalcHesapla() {
    const sleepTime = document.getElementById('hc-sleep-time-input').value;
    const now = new Date();
    
    let sleepDate;
    if (sleepTime) {
        const [h, m] = sleepTime.split(':').map(Number);
        sleepDate = new Date();
        sleepDate.setHours(h, m, 0);
    } else {
        sleepDate = now;
    }

    // 15 dk uykuya dalma
    const startTime = sleepDate.getTime() + (15 * 60000);

    const slotsContainer = document.getElementById('hc-res-wake-slots');
    slotsContainer.innerHTML = '';

    // 90 dk döngüler: 3, 4, 5, 6
    [3, 4, 5, 6].forEach(c => {
        const wakeDate = new Date(startTime + (c * 90 * 60000));
        const hh = wakeDate.getHours().toString().padStart(2, '0');
        const mm = wakeDate.getMinutes().toString().padStart(2, '0');
        
        const slot = document.createElement('div');
        slot.className = 'hc-wake-slot';
        slot.innerHTML = `<span>${hh}:${mm}</span><small>${c} Döngü Sleep</small>`;
        slotsContainer.appendChild(slot);
    });

    document.getElementById('hc-wake-calc-result').classList.add('visible');
}
