function hcSpeedConvert() {
    const val = parseFloat(document.getElementById('hc-speed-input').value);
    const from = document.getElementById('hc-speed-from').value;
    if (isNaN(val)) return;

    let kmh = 0;
    switch(from) {
        case 'kmh': kmh = val; break;
        case 'ms': kmh = val * 3.6; break;
        case 'mph': kmh = val * 1.60934; break;
        case 'knot': kmh = val * 1.852; break;
        case 'mach': kmh = val * 1225.044; break;
    }

    const units = [
        { id: 'kmh', name: 'km/sa', val: kmh },
        { id: 'ms', name: 'm/s', val: kmh / 3.6 },
        { id: 'mph', name: 'mil/sa (MPH)', val: kmh / 1.60934 },
        { id: 'knot', name: 'Knot', val: kmh / 1.852 },
        { id: 'mach', name: 'Mach', val: kmh / 1225.044 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 4})}</div>`;
        }
    });
    document.getElementById('hc-speed-results').innerHTML = html;
}
window.addEventListener('load', hcSpeedConvert);
