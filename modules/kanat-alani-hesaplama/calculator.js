function hcWaToggleMode() {
    const mode = document.getElementById('hc-wa-mode').value;
    document.getElementById('hc-wa-geo-inputs').style.display = (mode === 'geo' ? 'block' : 'none');
    document.getElementById('hc-wa-aero-inputs').style.display = (mode === 'aero' ? 'block' : 'none');
}

function hcWingAreaHesapla() {
    const mode = document.getElementById('hc-wa-mode').value;
    let s = 0;

    if (mode === 'geo') {
        const b = parseFloat(document.getElementById('hc-wa-b').value);
        const c = parseFloat(document.getElementById('hc-wa-c').value);
        if (isNaN(b) || isNaN(c)) { alert('Lütfen değerleri girin.'); return; }
        s = b * c;
    } else {
        const l = parseFloat(document.getElementById('hc-wa-l').value);
        const cl = parseFloat(document.getElementById('hc-wa-cl').value);
        const v = parseFloat(document.getElementById('hc-wa-v').value);
        const rho = 1.225;
        if (isNaN(l) || isNaN(cl) || isNaN(v) || v === 0 || cl === 0) {
            alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
            return;
        }
        // S = L / (0.5 * Cl * rho * V^2)
        s = l / (0.5 * cl * rho * Math.pow(v, 2));
    }

    document.getElementById('hc-wa-res-val').innerText = s.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m²';
    document.getElementById('hc-wa-result').classList.add('visible');
}
