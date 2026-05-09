function hcAluToggle() {
    const type = document.getElementById('hc-alu-type').value;
    document.getElementById('hc-alu-plate-inputs').style.display = type === 'plate' ? 'block' : 'none';
    document.getElementById('hc-alu-rod-inputs').style.display = type === 'rod' ? 'block' : 'none';
}

function hcAluHesapla() {
    const type = document.getElementById('hc-alu-type').value;
    const density = 2.7; // g/cm3
    let weightG = 0;

    if (type === 'plate') {
        const l = parseFloat(document.getElementById('hc-alu-l').value);
        const w = parseFloat(document.getElementById('hc-alu-w').value);
        const t = parseFloat(document.getElementById('hc-alu-t').value);
        if (isNaN(l) || isNaN(w) || isNaN(t)) { alert('Lütfen tüm alanları doldurun.'); return; }
        // Volume in cm3 = (l/10 * w/10 * t/10)
        weightG = (l * w * t / 1000) * density;
    } else {
        const d = parseFloat(document.getElementById('hc-alu-d').value);
        const len = parseFloat(document.getElementById('hc-alu-len').value);
        if (isNaN(d) || isNaN(len)) { alert('Lütfen tüm alanları doldurun.'); return; }
        // Volume = pi * r^2 * h
        const r = d / 20; // cm
        weightG = (Math.PI * Math.pow(r, 2) * (len / 10)) * density;
    }

    const weightKg = weightG / 1000;

    document.getElementById('hc-alu-val').innerText = weightKg.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg';
    document.getElementById('hc-alu-result').classList.add('visible');
}
