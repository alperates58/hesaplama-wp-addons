function hcIGToggle() {
    const calc = document.getElementById('hc-ig-calc').value;
    document.getElementById('hc-ig-p-group').style.display = calc === 'P' ? 'none' : 'block';
    document.getElementById('hc-ig-v-group').style.display = calc === 'V' ? 'none' : 'block';
    document.getElementById('hc-ig-n-group').style.display = calc === 'n' ? 'none' : 'block';
    document.getElementById('hc-ig-t-group').style.display = calc === 'T' ? 'none' : 'block';
}

function hcIGHesapla() {
    const calc = document.getElementById('hc-ig-calc').value;
    const R = 0.082057; // L·atm/(mol·K)

    let p = parseFloat(document.getElementById('hc-ig-p').value);
    let v = parseFloat(document.getElementById('hc-ig-v').value);
    let n = parseFloat(document.getElementById('hc-ig-n').value);
    let tc = parseFloat(document.getElementById('hc-ig-t').value);
    let t = tc + 273.15;

    let result = 0;
    let unit = "";

    if (calc === 'P') {
        if (isNaN(v) || isNaN(n) || isNaN(tc)) { alert('Lütfen tüm alanları doldurun.'); return; }
        result = (n * R * t) / v;
        unit = " atm";
    } else if (calc === 'V') {
        if (isNaN(p) || isNaN(n) || isNaN(tc)) { alert('Lütfen tüm alanları doldurun.'); return; }
        result = (n * R * t) / p;
        unit = " L";
    } else if (calc === 'n') {
        if (isNaN(p) || isNaN(v) || isNaN(tc)) { alert('Lütfen tüm alanları doldurun.'); return; }
        result = (p * v) / (R * t);
        unit = " mol";
    } else if (calc === 'T') {
        if (isNaN(p) || isNaN(v) || isNaN(n)) { alert('Lütfen tüm alanları doldurun.'); return; }
        result = (p * v) / (n * R) - 273.15;
        unit = " °C";
    }

    document.getElementById('hc-ig-val').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + unit;
    document.getElementById('hc-ig-result').classList.add('visible');
}
