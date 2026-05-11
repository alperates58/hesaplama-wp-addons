function hcOrifisHesapla() {
    const cd = parseFloat(document.getElementById('hc-od-cd').value);
    const d_mm = parseFloat(document.getElementById('hc-od-diam').value);
    const dp = parseFloat(document.getElementById('hc-od-dp').value);
    const rho = parseFloat(document.getElementById('hc-od-rho').value);

    if (isNaN(cd) || isNaN(d_mm) || isNaN(dp) || isNaN(rho) || rho <= 0 || d_mm <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const d_m = d_mm / 1000;
    const area = (Math.PI * Math.pow(d_m, 2)) / 4;

    // Q = Cd * A * sqrt(2 * ΔP / ρ)
    const q = cd * area * Math.sqrt((2 * dp) / rho);
    const lps = q * 1000;

    document.getElementById('hc-od-res-total').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-od-res-lps').innerText = lps.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-od-result').classList.add('visible');
}
