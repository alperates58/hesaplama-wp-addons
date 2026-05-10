function hcUdToggleMode() {
    const mode = document.getElementById('hc-ud-mode').value;
    const timeGroup = document.getElementById('hc-ud-time-group');
    if (mode === 'sleep') {
        timeGroup.style.display = 'none';
    } else {
        timeGroup.style.display = 'block';
    }
}

function hcUdHesapla() {
    const mode = document.getElementById('hc-ud-mode').value;
    const timeVal = document.getElementById('hc-ud-time').value;
    const resTitle = document.getElementById('hc-ud-res-title');
    const resList = document.getElementById('hc-ud-res-list');
    
    resList.innerHTML = '';
    const now = new Date();
    const fallingTime = 15; // minutes

    if (mode === 'wake') {
        if (!timeVal) { alert('Lütfen uyanma saatini seçin.'); return; }
        resTitle.innerText = timeVal + ' saatinde uyanmak için şu saatlerde yatmalısınız:';
        
        const wakeTime = new Date('2026-01-02T' + timeVal);
        const cycles = [6, 5, 4, 3]; // counts
        
        cycles.forEach(c => {
            const sleepTime = new Date(wakeTime.getTime() - (c * 90 * 60000) - (fallingTime * 60000));
            hcUdAddResult(sleepTime, c);
        });
    } else {
        resTitle.innerText = 'Şimdi yatarsanız şu saatlerde uyanmalısınız:';
        const startTime = new Date(now.getTime() + (fallingTime * 60000));
        const cycles = [3, 4, 5, 6];
        
        cycles.forEach(c => {
            const wakeTime = new Date(startTime.getTime() + (c * 90 * 60000));
            hcUdAddResult(wakeTime, c);
        });
    }

    document.getElementById('hc-uyku-dongusu-result').classList.add('visible');
}

function hcUdAddResult(date, cycle) {
    const resList = document.getElementById('hc-ud-res-list');
    const timeStr = date.getHours().toString().padStart(2, '0') + ':' + date.getMinutes().toString().padStart(2, '0');
    
    const div = document.createElement('div');
    div.className = 'hc-ud-item';
    if (cycle >= 5) div.classList.add('ideal');
    
    div.innerHTML = `
        <span class="hc-ud-time">${timeStr}</span>
        <span class="hc-ud-info">${cycle} Döngü (${(cycle * 1.5).toFixed(1)} Saat)</span>
    `;
    resList.appendChild(div);
}
