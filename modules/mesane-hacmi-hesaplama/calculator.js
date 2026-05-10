function hcBVToggle() {
    const method = document.getElementById('hc-bv-method').value;
    document.getElementById('hc-bv-dims').style.display = method === 'dims' ? 'block' : 'none';
    document.getElementById('hc-bv-age-div').style.display = method === 'age' ? 'block' : 'none';
}

function hcMesaneHacmiHesapla() {
    const method = document.getElementById('hc-bv-method').value;
    let vol = 0;

    if (method === 'dims') {
        const l = parseFloat(document.getElementById('hc-bv-l').value);
        const w = parseFloat(document.getElementById('hc-bv-w').value);
        const d = parseFloat(document.getElementById('hc-bv-d').value);
        if (!l || !w || !d) return;
        // Formula: L * W * D * 0.52 (ellipsoid)
        vol = l * w * d * 0.52 * 10; // mL
    } else {
        const age = parseFloat(document.getElementById('hc-bv-age-val').value);
        if (!age) return;
        // Formula: (Age + 2) * 30 mL
        vol = (age + 2) * 30;
    }

    document.getElementById('hc-bv-res').innerText = Math.round(vol) + ' mL';
    document.getElementById('hc-bv-result').classList.add('visible');
}
