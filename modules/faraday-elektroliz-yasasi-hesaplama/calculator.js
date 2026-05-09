function hcFaradayHesapla() {
    const I = parseFloat(document.getElementById('hc-f-i').value);
    const tMin = parseFloat(document.getElementById('hc-f-t').value);
    const n = parseFloat(document.getElementById('hc-f-n').value);

    if (isNaN(I) || isNaN(tMin) || isNaN(n)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const t = tMin * 60;
    const F = 96485;
    
    // Q = I * t
    const Q = I * t;
    // Eşdeğer gram = Q / F
    const eq = Q / F;
    // Mol = Eşdeğer gram / n
    const mol = eq / n;

    document.getElementById('hc-f-q').innerText = Q.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' C';
    document.getElementById('hc-f-mol').innerText = mol.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' mol';
    document.getElementById('hc-f-eq').innerText = eq.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    
    document.getElementById('hc-f-result').classList.add('visible');
}
