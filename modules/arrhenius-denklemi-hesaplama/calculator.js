function hcArrheniusHesapla() {
    const A = parseFloat(document.getElementById('hc-arr-a').value);
    const Ea = parseFloat(document.getElementById('hc-arr-ea').value); // kJ/mol
    const Tc = parseFloat(document.getElementById('hc-arr-t').value);

    if (isNaN(A) || isNaN(Ea) || isNaN(Tc)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const R = 8.314462618; // J/(mol·K)
    const T = Tc + 273.15;
    const EaJ = Ea * 1000;

    // k = A * exp(-Ea / (R * T))
    const k = A * Math.exp(-EaJ / (R * T));

    document.getElementById('hc-arr-val').innerText = k.toExponential(4);
    document.getElementById('hc-arr-result').classList.add('visible');
}
