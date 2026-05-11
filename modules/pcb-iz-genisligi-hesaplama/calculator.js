function hcPcbUpdateThick() {
    const type = document.getElementById('hc-pcb-thick-type').value;
    const input = document.getElementById('hc-pcb-thick-val');
    if (type === 'custom') {
        input.style.display = 'block';
    } else {
        input.style.display = 'none';
    }
}

function hcPcbHesapla() {
    const current = parseFloat(document.getElementById('hc-pcb-current').value);
    const tempRise = parseFloat(document.getElementById('hc-pcb-temp').value);
    const thickType = document.getElementById('hc-pcb-thick-type').value;
    const layer = document.querySelector('input[name="hc-pcb-layer"]:checked').value;
    
    let thickness_um = 35;
    if (thickType === 'custom') {
        thickness_um = parseFloat(document.getElementById('hc-pcb-thick-val').value);
    } else {
        thickness_um = parseFloat(thickType) * 35;
    }

    if (isNaN(current) || isNaN(tempRise) || isNaN(thickness_um) || current <= 0 || tempRise <= 0 || thickness_um <= 0) {
        alert('Lütfen geçerli pozitif değerler girin.');
        return;
    }

    // IPC-2221 Formula: Area [mils^2] = (I / (k * deltaT^0.44))^(1 / 0.725)
    // k = 0.048 for external, 0.024 for internal
    const k = (layer === 'external') ? 0.048 : 0.024;
    
    // Area in square mils
    const area_mils2 = Math.pow(current / (k * Math.pow(tempRise, 0.44)), 1 / 0.725);
    
    // Area in mm2
    const area_mm2 = area_mils2 * Math.pow(0.0254, 2);
    
    // Width in mm (Width = Area / Thickness)
    const width_mm = area_mm2 / (thickness_um / 1000);

    // Resistance calculation (optional but helpful)
    // R = rho * L / A. rho (copper) approx 1.7e-8 Ohm*m
    const rho = 1.72e-8;
    const length_m = 0.01; // 10mm
    const res = (rho * length_m) / (area_mm2 * 1e-6);

    document.getElementById('hc-pcb-res-width').innerText = width_mm.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-pcb-res-area').innerText = area_mm2.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-pcb-res-resistance').innerText = res.toLocaleString('tr-TR', { maximumSignificantDigits: 4 });

    document.getElementById('hc-pcb-result').classList.add('visible');
}
