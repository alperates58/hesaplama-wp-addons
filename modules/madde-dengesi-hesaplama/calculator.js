function hcMaddeDengesiHesapla() {
    const m1 = parseFloat(document.getElementById('hc-md-m1').value);
    const c1 = parseFloat(document.getElementById('hc-md-c1').value);
    const m2 = parseFloat(document.getElementById('hc-md-m2').value);
    const c2 = parseFloat(document.getElementById('hc-md-c2').value);

    if (isNaN(m1) || isNaN(c1) || isNaN(m2) || isNaN(c2)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const totalMass = m1 + m2;
    if (totalMass <= 0) { alert('Toplam kütle sıfır olamaz.'); return; }

    // M1*C1 + M2*C2 = (M1+M2)*C_mix
    const cMix = (m1 * c1 + m2 * c2) / totalMass;

    document.getElementById('hc-md-res-mass').innerText = totalMass.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-md-res-conc').innerText = cMix.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-md-result').classList.add('visible');
}
