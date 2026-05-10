function hcBisikletWattGücüHesapla() {
    const speedKmh = parseFloat(document.getElementById('hc-watt-speed').value);
    const weight = parseFloat(document.getElementById('hc-watt-weight').value);
    const grade = parseFloat(document.getElementById('hc-watt-grade').value) / 100;
    const CdA = parseFloat(document.getElementById('hc-watt-pos').value);

    if (!speedKmh || !weight) return;

    const v = speedKmh / 3.6; // m/s
    const rho = 1.225; // hava yoğunluğu
    const Crr = 0.005; // yuvarlanma direnci katsayısı
    const g = 9.81;

    // P_total = (P_air + P_rolling + P_gravity) / efficiency
    const Pair = 0.5 * CdA * rho * Math.pow(v, 3);
    const Proll = v * Crr * weight * g;
    const Pgrav = v * weight * g * grade;
    
    let Ptotal = Pair + Proll;
    if (Pgrav > 0) Ptotal += Pgrav;

    const totalWatt = Ptotal / 0.95; // %95 aktarma verimliliği

    document.getElementById('hc-watt-val').innerText = Math.round(totalWatt) + ' Watt';
    document.getElementById('hc-watt-wkg').innerText = `Güç/Ağırlık Oranı: ${(totalWatt / weight).toFixed(2)} W/kg`;
    document.getElementById('hc-watt-result').classList.add('visible');
}
