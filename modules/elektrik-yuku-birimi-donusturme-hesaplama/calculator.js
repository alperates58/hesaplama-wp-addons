function hcChargeConvert() {
    const val = parseFloat(document.getElementById('hc-charge-input').value);
    const from = document.getElementById('hc-charge-from').value;
    if (isNaN(val)) return;

    // Convert to Coulomb first
    let c = 0;
    switch(from) {
        case 'c': c = val; break;
        case 'mc': c = val / 1000; break;
        case 'uc': c = val / 1000000; break;
        case 'ah': c = val * 3600; break;
        case 'mah': c = val * 3.6; break;
    }

    const units = [
        { id: 'c', name: 'Coulomb (C)', val: c },
        { id: 'mc', name: 'Millicoulomb (mC)', val: c * 1000 },
        { id: 'uc', name: 'Microcoulomb (µC)', val: c * 1000000 },
        { id: 'ah', name: 'Ampere-hour (Ah)', val: c / 3600 },
        { id: 'mah', name: 'Milliampere-hour (mAh)', val: c / 3.6 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-charge-results').innerHTML = html;
}
window.addEventListener('load', hcChargeConvert);
