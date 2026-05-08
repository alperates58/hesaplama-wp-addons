function hcEnergyConvert() {
    const val = parseFloat(document.getElementById('hc-energy-input').value);
    const from = document.getElementById('hc-energy-from').value;
    if (isNaN(val)) return;

    let j = 0;
    switch(from) {
        case 'j': j = val; break;
        case 'kj': j = val * 1000; break;
        case 'cal': j = val * 4.184; break;
        case 'kcal': j = val * 4184; break;
        case 'wh': j = val * 3600; break;
        case 'kwh': j = val * 3600000; break;
    }

    const units = [
        { id: 'j', name: 'Joule (J)', val: j },
        { id: 'kj', name: 'Kilojoule (kJ)', val: j / 1000 },
        { id: 'cal', name: 'Kalori (cal)', val: j / 4.184 },
        { id: 'kcal', name: 'Kilokalori (kcal)', val: j / 4184 },
        { id: 'wh', name: 'Watt-saat (Wh)', val: j / 3600 },
        { id: 'kwh', name: 'Kilowatt-saat (kWh)', val: j / 3600000 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-energy-results').innerHTML = html;
}
window.addEventListener('load', hcEnergyConvert);
