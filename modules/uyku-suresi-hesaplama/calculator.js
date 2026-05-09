function hcSleepTimeHesapla() {
    const wakeTime = document.getElementById('hc-wake-time').value;
    if (!wakeTime) return;

    const [h, m] = wakeTime.split(':').map(Number);
    const wakeDate = new Date();
    wakeDate.setHours(h, m, 0);

    const slotsContainer = document.getElementById('hc-res-sleep-slots');
    slotsContainer.innerHTML = '';

    // 90 dakikalık 6, 5, 4 ve 3 döngüleri (sondan başa)
    const cycles = [6, 5, 4, 3];
    cycles.forEach(c => {
        const sleepDate = new Date(wakeDate.getTime() - (c * 90 * 60000) - (15 * 60000));
        const hh = sleepDate.getHours().toString().padStart(2, '0');
        const mm = sleepDate.getMinutes().toString().padStart(2, '0');
        
        const slot = document.createElement('div');
        slot.className = 'hc-sleep-slot';
        slot.innerHTML = `<span>${hh}:${mm}</span><small>${c} Döngü (${(c * 1.5).toFixed(1)} Saat)</small>`;
        slotsContainer.appendChild(slot);
    });

    document.getElementById('hc-sleep-time-result').classList.add('visible');
}
