function hcPmShapeChange() {
    const shape = document.getElementById('hc-pm-shape').value;
    document.getElementById('hc-pm-solid-round-fields').style.display = shape === 'solid-round' ? 'block' : 'none';
    document.getElementById('hc-pm-hollow-round-fields').style.display = shape === 'hollow-round' ? 'block' : 'none';
    document.getElementById('hc-pm-rect-fields').style.display = shape === 'rectangle' ? 'block' : 'none';
}

function hcPolarAtaletMomentiHesapla() {
    const shape = document.getElementById('hc-pm-shape').value;
    const unit = document.getElementById('hc-pm-unit').value;

    let J = 0; // J (polar moment of inertia)
    let area = 0; // cross sectional area

    if (shape === 'solid-round') {
        const d = parseFloat(document.getElementById('hc-pm-d').value);
        if (isNaN(d) || d <= 0) {
            alert('Lütfen geçerli bir çap giriniz.');
            return;
        }
        // J = pi * D^4 / 32
        J = (Math.PI * Math.pow(d, 4)) / 32;
        // Area = pi * D^2 / 4
        area = (Math.PI * Math.pow(d, 2)) / 4;
    } else if (shape === 'hollow-round') {
        const dOut = parseFloat(document.getElementById('hc-pm-d-out').value);
        const dIn = parseFloat(document.getElementById('hc-pm-d-in').value);
        if (isNaN(dOut) || isNaN(dIn) || dOut <= 0 || dIn <= 0) {
            alert('Lütfen geçerli dış çap ve iç çap giriniz.');
            return;
        }
        if (dIn >= dOut) {
            alert('İç çap, dış çaptan büyük veya eşit olamaz.');
            return;
        }
        // J = pi * (D^4 - d^4) / 32
        J = (Math.PI * (Math.pow(dOut, 4) - Math.pow(dIn, 4))) / 32;
        area = (Math.PI * (Math.pow(dOut, 2) - Math.pow(dIn, 2))) / 4;
    } else {
        const w = parseFloat(document.getElementById('hc-pm-w').value);
        const h = parseFloat(document.getElementById('hc-pm-h').value);
        if (isNaN(w) || isNaN(h) || w <= 0 || h <= 0) {
            alert('Lütfen geçerli genişlik ve yükseklik değerleri giriniz.');
            return;
        }
        // Polar moment for rectangular cross-section: J = Ix + Iy = (b * h^3 / 12) + (h * b^3 / 12) = b * h * (b^2 + h^2) / 12
        J = (w * h * (Math.pow(w, 2) + Math.pow(h, 2))) / 12;
        area = w * h;
    }

    // Format output based on units
    let unitLabel = unit + '⁴';
    let areaLabel = unit + '²';

    let J_alt = 0;
    let altUnitLabel = '';
    if (unit === 'mm') {
        J_alt = J / 10000; // mm4 -> cm4
        altUnitLabel = 'cm⁴';
    } else if (unit === 'cm') {
        J_alt = J * 10000; // cm4 -> mm4
        altUnitLabel = 'mm⁴';
    } else {
        J_alt = J * 1e8; // m4 -> cm4
        altUnitLabel = 'cm⁴';
    }

    document.getElementById('hc-pm-val').innerText = J.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' ' + unitLabel;
    document.getElementById('hc-pm-area-val').innerText = area.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ' + areaLabel;
    document.getElementById('hc-pm-alt-val').innerText = J_alt.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' ' + altUnitLabel;

    document.getElementById('hc-polar-atalet-momenti-result').classList.add('visible');
}
