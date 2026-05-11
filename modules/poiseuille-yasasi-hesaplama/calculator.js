function hcPoiseuilleHesapla() {
    const r = parseFloat(document.getElementById('hc-py-radius').value);
    const dp = parseFloat(document.getElementById('hc-py-pressure').value);
    const l = parseFloat(document.getElementById('hc-py-length').value);
    const mu = parseFloat(document.getElementById('hc-py-mu').value);

    if (isNaN(r) || isNaN(dp) || isNaN(l) || isNaN(mu) || mu <= 0 || l <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Q = (π * R⁴ * ΔP) / (8 * μ * L)
    const q = (Math.PI * Math.pow(r, 4) * dp) / (8 * mu * l);

    document.getElementById('hc-py-res-total').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 8 });
    document.getElementById('hc-py-result').classList.add('visible');
}
