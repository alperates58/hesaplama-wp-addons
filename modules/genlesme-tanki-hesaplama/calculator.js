function hcExpansionTankHesapla() {
    const sysV = parseFloat(document.getElementById('hc-et-sys-v').value);
    const temp = parseFloat(document.getElementById('hc-et-temp').value);
    const p0 = parseFloat(document.getElementById('hc-et-p0').value);
    const pe = parseFloat(document.getElementById('hc-et-pe').value);

    if (isNaN(sysV) || isNaN(temp) || isNaN(p0) || isNaN(pe) || pe <= p0) {
        alert('Lütfen geçerli değerler girin (Emniyet basıncı ön basınçtan büyük olmalıdır).');
        return;
    }

    // Expansion coefficient (approximate for water)
    // 0 to 90C is about 3.5%
    let e = 0.035;
    if (temp <= 50) e = 0.012;
    else if (temp <= 70) e = 0.023;
    else if (temp <= 90) e = 0.036;
    else e = 0.045;

    // Absolute pressures
    const p0Abs = p0 + 1;
    const peAbs = pe + 1;

    // V = (e * Vs) / (1 - (P0/Pe))
    const tankV = (e * sysV) / (1 - (p0Abs / peAbs));

    document.getElementById('hc-et-res-val').innerText = Math.ceil(tankV).toLocaleString('tr-TR') + ' Litre';
    
    document.getElementById('hc-et-result').classList.add('visible');
}
