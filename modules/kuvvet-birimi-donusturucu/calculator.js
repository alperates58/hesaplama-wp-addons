function hcForceConvert() {
    const val = parseFloat(document.getElementById('hc-force-input').value);
    const from = document.getElementById('hc-force-from').value;
    if (isNaN(val)) return;

    let n = 0;
    switch(from) {
        case 'n': n = val; break;
        case 'kn': n = val * 1000; break;
        case 'kgf': n = val * 9.80665; break;
        case 'lbf': n = val * 4.448222; break;
    }

    const units = [
        { id: 'n', name: 'Newton (N)', val: n },
        { id: 'kn', name: 'Kilonewton (kN)', val: n / 1000 },
        { id: 'kgf', name: 'Kilogram-kuvvet (kgf)', val: n / 9.80665 },
        { id: 'lbf', name: 'Pound-kuvvet (lbf)', val: n / 4.448222 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-force-results').innerHTML = html;
}
window.addEventListener('load', hcForceConvert);
