function hcAFToggle() {
    const type = document.getElementById('hc-af-type').value;
    document.getElementById('hc-af-freq-group').style.display = type === 'freq' ? 'block' : 'none';
    document.getElementById('hc-af-period-group').style.display = type === 'period' ? 'block' : 'none';
}

function hcAFHesapla() {
    const type = document.getElementById('hc-af-type').value;
    let omega = 0;

    if (type === 'freq') {
        const f = parseFloat(document.getElementById('hc-af-freq').value);
        if (isNaN(f) || f <= 0) { alert('Lütfen geçerli bir frekans giriniz.'); return; }
        omega = 2 * Math.PI * f;
    } else {
        const t = parseFloat(document.getElementById('hc-af-period').value);
        if (isNaN(t) || t <= 0) { alert('Lütfen geçerli bir periyot giriniz.'); return; }
        omega = (2 * Math.PI) / t;
    }

    document.getElementById('hc-af-val').innerText = omega.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' rad/s';
    document.getElementById('hc-af-result').classList.add('visible');
}
