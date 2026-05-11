function hcPompaGucHesapla() {
    const q_m3h = parseFloat(document.getElementById('hc-pg-flow').value);
    const h = parseFloat(document.getElementById('hc-pg-head').value);
    const rho = parseFloat(document.getElementById('hc-pg-rho').value);
    const eff = parseFloat(document.getElementById('hc-pg-eff').value);

    if (isNaN(q_m3h) || isNaN(h) || isNaN(rho) || isNaN(eff) || eff <= 0 || q_m3h <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const q_m3s = q_m3h / 3600;
    const g = 9.81;

    // P [Watt] = (Q * H * ρ * g) / η
    const p_watt = (q_m3s * h * rho * g) / eff;
    const p_kw = p_watt / 1000;
    const p_hp = p_kw * 1.341;

    document.getElementById('hc-pg-res-total').innerText = p_kw.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-pg-res-hp').innerText = p_hp.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-pg-result').classList.add('visible');
}
