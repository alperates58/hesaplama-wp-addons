function hcBaseConvert() {
    const valStr = document.getElementById('hc-base-input').value.trim();
    const fromBase = parseInt(document.getElementById('hc-base-from').value);
    
    if (valStr === "") return;
    
    const num = parseInt(valStr, fromBase);
    if (isNaN(num)) {
        document.getElementById('hc-base-results').innerHTML = "<div>Geçersiz sayı!</div>";
        return;
    }

    const bases = [
        { name: 'Onluk', base: 10 },
        { name: 'İkilik', base: 2 },
        { name: 'Onaltılık', base: 16 },
        { name: 'Sekizlik', base: 8 }
    ];

    let html = "";
    bases.forEach(b => {
        if (b.base !== fromBase) {
            html += `<div><strong>${b.name}:</strong><br>${num.toString(b.base).toUpperCase()}</div>`;
        }
    });
    document.getElementById('hc-base-results').innerHTML = html;
}
window.addEventListener('load', hcBaseConvert);
