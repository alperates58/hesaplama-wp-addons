function hcGLHesapla() {
    const gi = parseFloat(document.getElementById('hc-gl-gi').value);
    const carbs = parseFloat(document.getElementById('hc-gl-carbs').value);

    if (isNaN(gi) || isNaN(carbs)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const gl = (gi * carbs) / 100;
    
    document.getElementById('hc-gl-value').innerText = gl.toFixed(1).toLocaleString('tr-TR');

    const interp = document.getElementById('hc-gl-interp');
    if (gl <= 10) {
        interp.innerText = 'DÜŞÜK: Kan şekerini az etkiler.';
        interp.style.backgroundColor = '#e8f5e9';
        interp.style.color = '#2e7d32';
    } else if (gl <= 19) {
        interp.innerText = 'ORTA: Kan şekerini orta düzeyde etkiler.';
        interp.style.backgroundColor = '#fff3e0';
        interp.style.color = '#ef6c00';
    } else {
        interp.innerText = 'YÜKSEK: Kan şekerini hızla yükseltir.';
        interp.style.backgroundColor = '#ffebee';
        interp.style.color = '#c62828';
    }

    document.getElementById('hc-gl-result').classList.add('visible');
}
