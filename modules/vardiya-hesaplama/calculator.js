function hcVardiyaUpdate() {
    const type = document.getElementById('hc-vh-type').value;
    document.getElementById('hc-vh-custom-fields').style.display = (type === 'custom' ? 'block' : 'none');
}

function hcVardiyaHesapla() {
    const type = document.getElementById('hc-vh-type').value;
    let shifts = [];

    if (type === '8') {
        shifts = [
            { name: '1. Vardiya', start: '08:00', end: '16:00' },
            { name: '2. Vardiya', start: '16:00', end: '00:00' },
            { name: '3. Vardiya', start: '00:00', end: '08:00' }
        ];
    } else if (type === '12') {
        shifts = [
            { name: 'Gündüz Vardiyası', start: '08:00', end: '20:00' },
            { name: 'Gece Vardiyası', start: '20:00', end: '08:00' }
        ];
    } else {
        const start = document.getElementById('hc-vh-start').value;
        const duration = parseFloat(document.getElementById('hc-vh-duration').value) || 0;
        if (!start) { alert('Lütfen başlangıç saatini seçin.'); return; }
        
        const [h, m] = start.split(':').map(Number);
        const endMinutes = (h * 60 + m + duration * 60) % 1440;
        const endH = Math.floor(endMinutes / 60);
        const endM = endMinutes % 60;
        const endStr = (endH < 10 ? '0' + endH : endH) + ":" + (endM < 10 ? '0' + endM : endM);
        
        shifts = [{ name: 'Özel Vardiya', start: start, end: endStr }];
    }

    let html = "";
    shifts.forEach(s => {
        html += `<div><strong>${s.name}:</strong> ${s.start} - ${s.end}</div>`;
    });

    document.getElementById('hc-vh-val').innerHTML = html;
    document.getElementById('hc-vh-result').classList.add('visible');
}
