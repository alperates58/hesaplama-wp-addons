function hcCurrentConvert() {
    const val = parseFloat(document.getElementById('hc-current-input').value);
    const from = document.getElementById('hc-current-from').value;
    if (isNaN(val)) return;

    let a = 0;
    switch(from) {
        case 'a': a = val; break;
        case 'ma': a = val / 1000; break;
        case 'ua': a = val / 1000000; break;
        case 'ka': a = val * 1000; break;
        case 'ma2': a = val * 1000000; break;
    }

    const units = [
        { id: 'a', name: 'Amper (A)', val: a },
        { id: 'ma', name: 'Miliamper (mA)', val: a * 1000 },
        { id: 'ua', name: 'Mikroamper (µA)', val: a * 1000000 },
        { id: 'ka', name: 'Kiloamper (kA)', val: a / 1000 },
        { id: 'ma2', name: 'Megaamper (MA)', val: a / 1000000 }
    ];

    let html = "";
    units.forEach(u => {
        if (u.id !== from) {
            html += `<div><strong>${u.name}:</strong><br>${u.val.toLocaleString('tr-TR', {maximumFractionDigits: 6})}</div>`;
        }
    });
    document.getElementById('hc-current-results').innerHTML = html;
}
window.addEventListener('load', hcCurrentConvert);
