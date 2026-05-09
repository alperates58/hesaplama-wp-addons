function hcAHToggle() {
    const type = document.getElementById('hc-ah-type').value;
    document.getElementById('hc-ah-rpm-group').style.display = type === 'rpm' ? 'block' : 'none';
    document.getElementById('hc-ah-linear-group').style.display = type === 'linear' ? 'block' : 'none';
}

function hcAHHesapla() {
    const type = document.getElementById('hc-ah-type').value;
    let omega = 0;

    if (type === 'rpm') {
        const rpm = parseFloat(document.getElementById('hc-ah-rpm').value);
        if (isNaN(rpm) || rpm < 0) { alert('Lütfen geçerli bir RPM giriniz.'); return; }
        omega = (2 * Math.PI * rpm) / 60;
        document.getElementById('hc-ah-note').innerText = 'ω = 2π * RPM / 60';
    } else {
        const v = parseFloat(document.getElementById('hc-ah-v').value);
        const r = parseFloat(document.getElementById('hc-ah-r').value);
        if (isNaN(v) || isNaN(r) || r <= 0) { alert('Lütfen geçerli hız ve yarıçap giriniz.'); return; }
        omega = v / r;
        document.getElementById('hc-ah-note').innerText = 'ω = v / r';
    }

    document.getElementById('hc-ah-val').innerText = omega.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' rad/s';
    document.getElementById('hc-ah-result').classList.add('visible');
}
