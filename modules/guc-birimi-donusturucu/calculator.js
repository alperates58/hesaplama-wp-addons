function hcPowerConvert() {
    const val = parseFloat(document.getElementById('hc-power-input').value);
    const from = document.getElementById('hc-power-from').value;
    if (isNaN(val)) return;

    let w = 0;
    switch(from) {
        case 'w': w = val; break;
        case 'kw': w = val * 1000; break;
        case 'mw': w = val * 1000000; break;
        case 'hp': w = val * 735.499; break;
        case 'hp_us': w = val * 745.7; break;
    }

    const units = [
        { id: 'w', name: 'Watt (W)', val: w },
        { id: 'kw', name: 'Kilowatt (kW)', val: w / 1000 },
        { id: 'mw', name: 'Megawatt (MW)', val: w / 1000000 },
        { id: 'hp', name: 'Beygir Gücü (PS)', val: w / 735.499 },
        { id: 'hp_us', name: 'Beygir Gücü (HP)', val: w / 745.7 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 4})}</div>`;
        }
    });
    document.getElementById('hc-power-results').innerHTML = html;
}
window.addEventListener('load', hcPowerConvert);
