function hcMilCapHesapla() {
    const torque = parseFloat(document.getElementById('hc-mc-torque').value);
    const stress_mpa = parseFloat(document.getElementById('hc-mc-stress').value);

    if (isNaN(torque) || isNaN(stress_mpa) || stress_mpa <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // d = ((16 * T) / (π * τ))^(1/3)
    // τ [Pa] = stress_mpa * 1e6
    const stress_pa = stress_mpa * 1e6;
    const d_m = Math.pow((16 * torque) / (Math.PI * stress_pa), 1/3);
    const d_mm = d_m * 1000;

    document.getElementById('hc-mc-res-total').innerText = d_mm.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-mc-result').classList.add('visible');
}
