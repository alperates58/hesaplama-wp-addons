function hcRhoConvert() {
    const val = parseFloat(document.getElementById('hc-rho-input').value);
    const from = document.getElementById('hc-rho-from').value;
    if (isNaN(val)) return;

    let kgm3 = 0;
    switch(from) {
        case 'kgm3': kgm3 = val; break;
        case 'gcm3': kgm3 = val * 1000; break;
        case 'lbft3': kgm3 = val * 16.0185; break;
        case 'gl': kgm3 = val; break;
    }

    const units = [
        { id: 'kgm3', name: 'kg/m³', val: kgm3 },
        { id: 'gcm3', name: 'g/cm³ (kg/L)', val: kgm3 / 1000 },
        { id: 'lbft3', name: 'lb/ft³', val: kgm3 / 16.0185 },
        { id: 'gl', name: 'g/L', val: kgm3 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-rho-results').innerHTML = html;
}
window.addEventListener('load', hcRhoConvert);
