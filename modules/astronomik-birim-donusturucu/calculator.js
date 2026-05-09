function hcAuConvert() {
    const val = parseFloat(document.getElementById('hc-au-input').value);
    const from = document.getElementById('hc-au-from').value;
    if (isNaN(val)) return;

    let au = 0;
    switch(from) {
        case 'au': au = val; break;
        case 'km': au = val / 149597870.7; break;
        case 'ly': au = val * 63241.077; break;
    }

    const units = [
        { id: 'au', name: 'Astronomik Birim (AU)', val: au },
        { id: 'km', name: 'Kilometre (km)', val: au * 149597870.7 },
        { id: 'ly', name: 'Işık Yılı (ly)', val: au / 63241.077 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-au-results').innerHTML = html;
}
window.addEventListener('load', hcAuConvert);
