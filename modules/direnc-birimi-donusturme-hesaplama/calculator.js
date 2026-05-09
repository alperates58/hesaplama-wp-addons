function hcResConvert() {
    const val = parseFloat(document.getElementById('hc-res-input').value);
    const from = document.getElementById('hc-res-from').value;
    if (isNaN(val)) return;

    let ohm = 0;
    switch(from) {
        case 'ohm': ohm = val; break;
        case 'kohm': ohm = val * 1000; break;
        case 'mohm': ohm = val * 1000000; break;
        case 'miohm': ohm = val / 1000; break;
    }

    const units = [
        { id: 'ohm', name: 'Ohm (Ω)', val: ohm },
        { id: 'kohm', name: 'Kilohm (kΩ)', val: ohm / 1000 },
        { id: 'mohm', name: 'Megohm (MΩ)', val: ohm / 1000000 },
        { id: 'miohm', name: 'Miliohm (mΩ)', val: ohm * 1000 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-res-results').innerHTML = html;
}
window.addEventListener('load', hcResConvert);
