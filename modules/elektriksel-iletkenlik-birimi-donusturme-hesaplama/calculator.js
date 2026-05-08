function hcCondConvert() {
    const val = parseFloat(document.getElementById('hc-cond-input').value);
    const from = document.getElementById('hc-cond-from').value;
    if (isNaN(val)) return;

    let s = 0;
    switch(from) {
        case 's': s = val; break;
        case 'ms': s = val / 1000; break;
        case 'us': s = val / 1000000; break;
        case 'mho': s = val; break;
    }

    const units = [
        { id: 's', name: 'Siemens (S)', val: s },
        { id: 'ms', name: 'Milisiemens (mS)', val: s * 1000 },
        { id: 'us', name: 'Mikrosiemens (µS)', val: s * 1000000 },
        { id: 'mho', name: 'Mho', val: s }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-cond-results').innerHTML = html;
}
window.addEventListener('load', hcCondConvert);
