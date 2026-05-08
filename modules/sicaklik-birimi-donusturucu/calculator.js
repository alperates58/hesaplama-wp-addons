function hcTempConvert() {
    const val = parseFloat(document.getElementById('hc-temp-input').value);
    const from = document.getElementById('hc-temp-from').value;
    if (isNaN(val)) return;

    let c = 0;
    switch(from) {
        case 'c': c = val; break;
        case 'f': c = (val - 32) * 5 / 9; break;
        case 'k': c = val - 273.15; break;
    }

    const units = [
        { id: 'c', name: 'Celsius (°C)', val: c },
        { id: 'f', name: 'Fahrenheit (°F)', val: (c * 9 / 5) + 32 },
        { id: 'k', name: 'Kelvin (K)', val: c + 273.15 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 2})}</div>`;
        }
    });
    document.getElementById('hc-temp-results').innerHTML = html;
}
window.addEventListener('load', hcTempConvert);
