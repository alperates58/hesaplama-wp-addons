function hcVolConvert() {
    const val = parseFloat(document.getElementById('hc-vol-input').value);
    const from = document.getElementById('hc-vol-from').value;
    if (isNaN(val)) return;

    let l = 0;
    switch(from) {
        case 'l': l = val; break;
        case 'ml': l = val / 1000; break;
        case 'm3': l = val * 1000; break;
        case 'gal_us': l = val * 3.78541; break;
        case 'gal_uk': l = val * 4.54609; break;
        case 'cup': l = val * 0.236588; break;
        case 'pint': l = val * 0.473176; break;
    }

    const units = [
        { id: 'l', name: 'Litre (L)', val: l },
        { id: 'ml', name: 'Mililitre (mL)', val: l * 1000 },
        { id: 'm3', name: 'Metreküp (m³)', val: l / 1000 },
        { id: 'gal_us', name: 'Galon (US)', val: l / 3.78541 },
        { id: 'gal_uk', name: 'Galon (UK)', val: l / 4.54609 },
        { id: 'cup', name: 'Bardak (US Cup)', val: l / 0.236588 },
        { id: 'pint', name: 'Pint (US Liquid)', val: l / 0.473176 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 4})}</div>`;
        }
    });
    document.getElementById('hc-vol-results').innerHTML = html;
}
window.addEventListener('load', hcVolConvert);
