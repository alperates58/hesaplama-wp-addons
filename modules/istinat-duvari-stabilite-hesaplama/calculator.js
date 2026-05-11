function hcRetainingWallHesapla() {
    const h = parseFloat(document.getElementById('hc-rw-h').value);
    const b = parseFloat(document.getElementById('hc-rw-b').value);
    const phiDeg = parseFloat(document.getElementById('hc-rw-phi').value);
    const gammaS = parseFloat(document.getElementById('hc-rw-gamma').value);
    const gammaC = 24; // Beton birim ağırlığı kN/m3

    if (isNaN(h) || isNaN(b) || isNaN(phiDeg) || h <= 0 || b <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const phiRad = (phiDeg * Math.PI) / 180;
    
    // Active Earth Pressure Coefficient (Rankine)
    const ka = (1 - Math.sin(phiRad)) / (1 + Math.sin(phiRad));

    // Active Force Pa = 0.5 * Ka * gamma * H^2
    const pa = 0.5 * ka * gammaS * Math.pow(h, 2);

    // Overturning Moment Mo = Pa * (H / 3)
    const mo = pa * (h / 3);

    // Weight of wall W = B * H * gammaC (simplified rectangular wall)
    const w = b * h * gammaC;

    // Resisting Moment Mr = W * (B / 2)
    const mr = w * (b / 2);

    // Factor of Safety Overturning FSo = Mr / Mo
    const fso = mr / mo;

    // Resisting Force Fr = W * tan(delta) where delta ~ 2/3 * phi
    const delta = (2/3) * phiRad;
    const fr = w * Math.tan(delta);

    // Factor of Safety Sliding FSs = Fr / Pa
    const fss = fr / pa;

    document.getElementById('hc-rw-res-fso').innerText = fso.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-rw-res-fss').innerText = fss.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    let status = "";
    if (fso > 1.5 && fss > 1.5) {
        status = "<span style='color:green;'>Sistem Stabil (Güvenli)</span>";
    } else {
        status = "<span style='color:red;'>Stabilite Yetersiz</span>";
    }

    document.getElementById('hc-rw-res-status').innerHTML = status;
    document.getElementById('hc-rw-result').classList.add('visible');
}
