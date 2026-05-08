function hcVoltConvert() {
    const val = parseFloat(document.getElementById('hc-volt-input').value);
    const from = document.getElementById('hc-volt-from').value;
    if (isNaN(val)) return;

    let v = 0;
    switch(from) {
        case 'v': v = val; break;
        case 'mv': v = val / 1000; break;
        case 'uv': v = val / 1000000; break;
        case 'kv': v = val * 1000; break;
        case 'mv2': v = val * 1000000; break;
    }

    const units = [
        { id: 'v', name: 'Volt (V)', val: v },
        { id: 'mv', name: 'Milivolt (mV)', val: v * 1000 },
        { id: 'uv', name: 'Mikrovolt (µV)', val: v * 1000000 },
        { id: 'kv', name: 'Kilovolt (kV)', val: v / 1000 },
        { id: 'mv2', name: 'Megavolt (MV)', val: v / 1000000 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-volt-results').innerHTML = html;
}
window.addEventListener('load', hcVoltConvert);
