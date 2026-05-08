function hcTorque2Convert() {
    const val = parseFloat(document.getElementById('hc-torque2-input').value);
    const from = document.getElementById('hc-torque2-from').value;
    if (isNaN(val)) return;

    let nm = 0;
    switch(from) {
        case 'nm': nm = val; break;
        case 'kgm': nm = val * 9.80665; break;
        case 'lbft': nm = val * 1.355818; break;
    }

    const units = [
        { id: 'nm', name: 'Newton-metre (Nm)', val: nm },
        { id: 'kgm', name: 'Kilogram-metre (kgm)', val: nm / 9.80665 },
        { id: 'lbft', name: 'Pound-foot (lb-ft)', val: nm / 1.355818 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 4})}</div>`;
        }
    });
    document.getElementById('hc-torque2-results').innerHTML = html;
}
window.addEventListener('load', hcTorque2Convert);
