function hcDarcyWeisbachHesapla() {
    const L = parseFloat(document.getElementById('hc-dw-l').value);
    const Dmm = parseFloat(document.getElementById('hc-dw-d').value);
    const v = parseFloat(document.getElementById('hc-dw-v').value);
    const f = parseFloat(document.getElementById('hc-dw-f').value);
    const g = 9.80665;
    const rho = 1000; // Standart su yoğunluğu

    if ([L, Dmm, v, f].some(isNaN) || Dmm <= 0) {
        alert('Lütfen tüm alanları geçerli sayılarla doldurun.');
        return;
    }

    const D = Dmm / 1000;
    // hf = f * (L/D) * (v^2 / 2g)
    const hf = f * (L / D) * (Math.pow(v, 2) / (2 * g));
    const deltaP = hf * rho * g;

    document.getElementById('hc-dw-res-m').innerText = hf.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m';
    document.getElementById('hc-dw-res-pa').innerText = Math.round(deltaP).toLocaleString('tr-TR') + ' Pa';
    
    document.getElementById('hc-dw-result').classList.add('visible');
}
