function hcMepHesapla() {
    const torque = parseFloat(document.getElementById('hc-mep-torque').value);
    const disp_cc = parseFloat(document.getElementById('hc-mep-disp').value);
    const n_rev = parseInt(document.getElementById('hc-mep-stroke').value); // 2 for 4-stroke, 1 for 2-stroke

    if (isNaN(torque) || isNaN(disp_cc) || disp_cc <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // MEP [Pa] = (P_power * n_rev) / (V_disp * N_speed)
    // Also MEP [Pa] = (2 * π * Torque * n_rev) / V_disp
    // V_disp [m3] = disp_cc * 1e-6
    const disp_m3 = disp_cc * 1e-6;
    const mep_pa = (2 * Math.PI * torque * n_rev) / disp_m3;
    const mep_bar = mep_pa / 100000;

    document.getElementById('hc-mep-res-total').innerText = mep_bar.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-mep-result').classList.add('visible');
}
