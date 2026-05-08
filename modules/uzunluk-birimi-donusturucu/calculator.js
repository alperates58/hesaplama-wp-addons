function hcLenConvert() {
    const val = parseFloat(document.getElementById('hc-len-input').value);
    const from = document.getElementById('hc-len-from').value;
    if (isNaN(val)) return;

    let m = 0;
    switch(from) {
        case 'm': m = val; break;
        case 'cm': m = val / 100; break;
        case 'mm': m = val / 1000; break;
        case 'km': m = val * 1000; break;
        case 'in': m = val * 0.0254; break;
        case 'ft': m = val * 0.3048; break;
        case 'mi': m = val * 1609.344; break;
    }

    const units = [
        { id: 'm', name: 'Metre (m)', val: m },
        { id: 'cm', name: 'Santimetre (cm)', val: m * 100 },
        { id: 'mm', name: 'Milimetre (mm)', val: m * 1000 },
        { id: 'km', name: 'Kilometre (km)', val: m / 1000 },
        { id: 'in', name: 'İnç (in)', val: m / 0.0254 },
        { id: 'ft', name: 'Feet (ft)', val: m / 0.3048 },
        { id: 'mi', name: 'Mil (mi)', val: m / 1609.344 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-len-results').innerHTML = html;
}
window.addEventListener('load', hcLenConvert);
