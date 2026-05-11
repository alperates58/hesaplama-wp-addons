function hcOsyHesapla() {
    const t_c = parseFloat(document.getElementById('hc-osy-temp').value);
    const p = parseFloat(document.getElementById('hc-osy-press').value);
    const d_nm = parseFloat(document.getElementById('hc-osy-diam').value);

    if (isNaN(t_c) || isNaN(p) || isNaN(d_nm) || p <= 0 || d_nm <= 0) {
        alert('Lütfen geçerli pozitif değerler girin.');
        return;
    }

    const t_k = t_c + 273.15;
    const d_m = d_nm * 1e-9;
    const kb = 1.380649e-23; // Boltzmann constant

    // λ = (kb * T) / (sqrt(2) * π * d² * P)
    const lambda = (kb * t_k) / (Math.sqrt(2) * Math.PI * Math.pow(d_m, 2) * p);

    document.getElementById('hc-osy-res-total').innerText = lambda.toLocaleString('tr-TR', { maximumSignificantDigits: 4 });
    document.getElementById('hc-osy-result').classList.add('visible');
}
