function hc90mHesapla() {
    const timeStr = document.getElementById('hc-90m-time').value;
    if (!timeStr) return;

    const tbody = document.getElementById('hc-90m-res-body');
    tbody.innerHTML = '';

    const sleepTime = new Date('2026-01-01T' + timeStr);
    
    for (let i = 1; i <= 6; i++) {
        const wakeTime = new Date(sleepTime.getTime() + (i * 90 * 60000) + (15 * 60000));
        const wakeStr = wakeTime.getHours().toString().padStart(2, '0') + ':' + wakeTime.getMinutes().toString().padStart(2, '0');
        
        let status = 'Kısa';
        let color = '#7f8c8d';
        if (i === 5 || i === 6) { status = 'İdeal'; color = '#27ae60'; }
        else if (i === 4) { status = 'Yeterli'; color = '#f39c12'; }

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${i}</td>
            <td>${i * 1.5} Saat</td>
            <td><strong>${wakeStr}</strong></td>
            <td style="color:${color}">${status}</td>
        `;
        tbody.appendChild(tr);
    }

    document.getElementById('hc-90m-sleep-result').classList.add('visible');
}
