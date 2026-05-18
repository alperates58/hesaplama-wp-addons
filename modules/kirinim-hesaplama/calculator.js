function hcKirinimTipiDegis() {
    const type = document.getElementById('hc-kirinim-type').value;
    const label = document.getElementById('hc-kirinim-genislik-label');
    if (type === 'tek') {
        label.innerHTML = 'Yarık Genişliği (w - mm)';
    } else {
        label.innerHTML = 'Yarıklar Arası Mesafe (d - mm)';
    }
}

function hcKirinimHesapla() {
    const type = document.getElementById('hc-kirinim-type').value;
    const lambda = parseFloat(document.getElementById('hc-kirinim-dalga').value); // nm
    const w = parseFloat(document.getElementById('hc-kirinim-genislik').value); // mm
    const L = parseFloat(document.getElementById('hc-kirinim-ekran').value); // m

    if (!lambda || !w || !L || lambda <= 0 || w <= 0 || L <= 0) {
        alert('Lütfen geçerli ve pozitif değerler giriniz.');
        return;
    }

    // Birim dönüşümleri:
    // lambda: nm -> m (x 10^-9)
    // w: mm -> m (x 10^-3)
    const lambdaM = lambda * 1e-9;
    const wM = w * 1e-3;

    // Saçak genişliği formülü: Delta x = (lambda * L) / w
    let deltaX = (lambdaM * L) / wM; // m
    
    // Tek yarıkta merkezi saçak genişliği 2 * Delta x olur
    let displayDeltaX = type === 'tek' ? 2 * deltaX : deltaX;
    
    // Sonucu mm cinsinden gösterelim
    const deltaXMm = displayDeltaX * 1000;

    document.getElementById('hc-kirinim-val').innerText = deltaXMm.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' mm';

    // Tablo doldurma: m = 1, 2, 3 için konumlar
    const tbody = document.getElementById('hc-kirinim-table-body');
    tbody.innerHTML = '';

    for (let m = 1; m <= 3; m++) {
        // sin(theta) = m * lambda / w
        const sinTheta = (m * lambdaM) / wM;
        if (sinTheta > 1) continue; // Fiziksel sınır

        const thetaRad = Math.asin(sinTheta);
        const thetaDeg = thetaRad * (180 / Math.PI);
        
        // y = L * tan(theta)
        const y = L * Math.tan(thetaRad) * 1000; // mm

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${m}. Karanlık</td>
            <td>${thetaDeg.toLocaleString('tr-TR', { maximumFractionDigits: 3 })}°</td>
            <td>${y.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} mm</td>
        `;
        tbody.appendChild(tr);
    }

    document.getElementById('hc-kirinim-result').classList.add('visible');
}
