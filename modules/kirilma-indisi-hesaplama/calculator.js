function hcRefractiveMethodChange() {
    const method = document.getElementById('hc-ri-method').value;
    document.getElementById('hc-ri-velocity-fields').style.display = method === 'velocity' ? 'block' : 'none';
    document.getElementById('hc-ri-snell-fields').style.display = method === 'snell' ? 'block' : 'none';
}

function hcKırılmaİndisiHesapla() {
    const method = document.getElementById('hc-ri-method').value;
    let n = 0;

    if (method === 'velocity') {
        const v = parseFloat(document.getElementById('hc-ri-v').value);
        if (!v) return;
        // n = c / v, c = 2.9979 x 10^8 m/s
        n = 2.9979 / v;
    } else {
        const a1 = parseFloat(document.getElementById('hc-ri-angle1').value);
        const a2 = parseFloat(document.getElementById('hc-ri-angle2').value);
        const n1 = parseFloat(document.getElementById('hc-ri-n1').value);
        if (!a1 || !a2 || !n1) return;
        
        // n2 = n1 * sin(a1) / sin(a2)
        const rad1 = a1 * (Math.PI / 180);
        const rad2 = a2 * (Math.PI / 180);
        n = n1 * Math.sin(rad1) / Math.sin(rad2);
    }

    document.getElementById('hc-ri-val').innerText = n.toFixed(4);
    document.getElementById('hc-ri-result').classList.add('visible');
}
