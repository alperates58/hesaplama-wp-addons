function hcElasticCalcHesapla() {
    const e = parseFloat(document.getElementById('hc-es-e').value);
    const nu = parseFloat(document.getElementById('hc-es-nu').value);

    if (isNaN(e) || isNaN(nu) || nu >= 0.5 || nu <= -1) {
        alert('Lütfen geçerli değerler girin. Poisson oranı -1 ile 0.5 arasında olmalıdır.');
        return;
    }

    // G = E / (2 * (1 + nu))
    const g = e / (2 * (1 + nu));
    
    // K = E / (3 * (1 - 2*nu))
    const k = e / (3 * (1 - 2 * nu));

    document.getElementById('hc-es-res-g').innerText = g.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' GPa';
    document.getElementById('hc-es-res-k').innerText = k.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' GPa';
    
    document.getElementById('hc-es-result').classList.add('visible');
}
