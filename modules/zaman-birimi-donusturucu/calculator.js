function hcTimeConvert() {
    const val = parseFloat(document.getElementById('hc-time-input').value);
    const from = document.getElementById('hc-time-from').value;
    if (isNaN(val)) return;

    let s = 0;
    switch(from) {
        case 's': s = val; break;
        case 'min': s = val * 60; break;
        case 'h': s = val * 3600; break;
        case 'd': s = val * 86400; break;
        case 'w': s = val * 604800; break;
        case 'mo': s = val * 2592000; break;
        case 'y': s = val * 31536000; break;
    }

    const units = [
        { id: 's', name: 'Saniye (s)', val: s },
        { id: 'min', name: 'Dakika (min)', val: s / 60 },
        { id: 'h', name: 'Saat (h)', val: s / 3600 },
        { id: 'd', name: 'Gün (d)', val: s / 86400 },
        { id: 'w', name: 'Hafta (w)', val: s / 604800 },
        { id: 'mo', name: 'Ay (30 gün)', val: s / 2592000 },
        { id: 'y', name: 'Yıl (365 gün)', val: s / 31536000 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-time-results').innerHTML = html;
}
window.addEventListener('load', hcTimeConvert);
