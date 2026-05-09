function hcViscConvert() {
    const val = parseFloat(document.getElementById('hc-visc-input').value);
    const from = document.getElementById('hc-visc-from').value;
    if (isNaN(val)) return;

    let mpas = 0;
    switch(from) {
        case 'cp': mpas = val; break;
        case 'mpas': mpas = val; break;
        case 'pas': mpas = val * 1000; break;
        case 'p': mpas = val * 100; break;
    }

    const units = [
        { id: 'cp', name: 'Centipoise (cP)', val: mpas },
        { id: 'mpas', name: 'mPa·s', val: mpas },
        { id: 'pas', name: 'Pa·s', val: mpas / 1000 },
        { id: 'p', name: 'Poise (P)', val: mpas / 100 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-visc-results').innerHTML = html;
}
window.addEventListener('load', hcViscConvert);
