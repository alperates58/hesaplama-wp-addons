function hcStlToggle() {
    const type = document.getElementById('hc-stl-type').value;
    document.getElementById('hc-stl-flat').style.display = type === 'flat' ? 'block' : 'none';
    document.getElementById('hc-stl-round').style.display = type === 'round' ? 'block' : 'none';
    document.getElementById('hc-stl-square').style.display = type === 'square' ? 'block' : 'none';
}

function hcStlHesapla() {
    const type = document.getElementById('hc-stl-type').value;
    const len = parseFloat(document.getElementById('hc-stl-len').value);
    const density = 7.85; // g/cm3
    let areaCm2 = 0;

    if (type === 'flat') {
        const w = parseFloat(document.getElementById('hc-stl-w').value);
        const t = parseFloat(document.getElementById('hc-stl-t').value);
        if (isNaN(w) || isNaN(t)) { alert('Lütfen ölçüleri giriniz.'); return; }
        areaCm2 = (w / 10) * (t / 10);
    } else if (type === 'round') {
        const d = parseFloat(document.getElementById('hc-stl-d').value);
        if (isNaN(d)) { alert('Lütfen çapı giriniz.'); return; }
        areaCm2 = Math.PI * Math.pow(d / 20, 2);
    } else {
        const a = parseFloat(document.getElementById('hc-stl-a').value);
        if (isNaN(a)) { alert('Lütfen kenar ölçüsünü giriniz.'); return; }
        areaCm2 = Math.pow(a / 10, 2);
    }

    if (isNaN(len) || len <= 0) {
        alert('Lütfen boyu giriniz.');
        return;
    }

    const weightKg = (areaCm2 * (len * 100) * density) / 1000;

    document.getElementById('hc-stl-val').innerText = weightKg.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg';
    document.getElementById('hc-stl-result').classList.add('visible');
}
