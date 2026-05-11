function hcPistonKuvvetHesapla() {
    const bar = parseFloat(document.getElementById('hc-pk-pressure').value);
    const d_mm = parseFloat(document.getElementById('hc-pk-diam').value);

    if (isNaN(bar) || isNaN(d_mm) || d_mm <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // P [Pascal] = Bar * 100000
    const p_pa = bar * 100000;
    // Area [m2] = π * (d/2)^2
    const r_m = (d_mm / 1000) / 2;
    const area = Math.PI * Math.pow(r_m, 2);

    // F = P * A
    const force_n = p_pa * area;
    const force_kg = force_n / 9.80665;

    document.getElementById('hc-pk-res-total').innerText = force_n.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-pk-res-kg').innerText = force_kg.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-pk-result').classList.add('visible');
}
