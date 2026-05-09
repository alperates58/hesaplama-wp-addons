function hcFlowConvert() {
    const val = parseFloat(document.getElementById('hc-flow-input').value);
    const from = document.getElementById('hc-flow-from').value;
    if (isNaN(val)) return;

    let ls = 0;
    switch(from) {
        case 'ls': ls = val; break;
        case 'lm': ls = val / 60; break;
        case 'm3h': ls = val / 3.6; break;
        case 'm3s': ls = val * 1000; break;
        case 'gpm': ls = val * 0.06309; break;
    }

    const units = [
        { id: 'ls', name: 'Litre/Saniye (L/s)', val: ls },
        { id: 'lm', name: 'Litre/Dakika (L/min)', val: ls * 60 },
        { id: 'm3h', name: 'Metreküp/Saat (m³/h)', val: ls * 3.6 },
        { id: 'm3s', name: 'Metreküp/Saniye (m³/s)', val: ls / 1000 },
        { id: 'gpm', name: 'Galon/Dakika (gpm)', val: ls / 0.06309 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-flow-results').innerHTML = html;
}
window.addEventListener('load', hcFlowConvert);
