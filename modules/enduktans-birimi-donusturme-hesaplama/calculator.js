function hcIndConvert() {
    const val = parseFloat(document.getElementById('hc-ind-input').value);
    const from = document.getElementById('hc-ind-from').value;
    if (isNaN(val)) return;

    let h = 0;
    switch(from) {
        case 'h': h = val; break;
        case 'mh': h = val / 1000; break;
        case 'uh': h = val / 1000000; break;
        case 'nh': h = val / 1000000000; break;
    }

    const units = [
        { id: 'h', name: 'Henry (H)', val: h },
        { id: 'mh', name: 'Milihenry (mH)', val: h * 1000 },
        { id: 'uh', name: 'Mikrohenry (µH)', val: h * 1000000 },
        { id: 'nh', name: 'Nanohenry (nH)', val: h * 1000000000 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-ind-results').innerHTML = html;
}
window.addEventListener('load', hcIndConvert);
