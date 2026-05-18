function hcNfSurfaceChange() {
    const surface = document.getElementById('hc-nf-surface').value;
    document.getElementById('hc-nf-angle-group').style.display = surface === 'inclined' ? 'block' : 'none';
}

function hcNormalKuvvetHesapla() {
    const surface = document.getElementById('hc-nf-surface').value;
    const m = parseFloat(document.getElementById('hc-nf-mass').value);
    const extForce = parseFloat(document.getElementById('hc-nf-external').value) || 0;
    const g = 9.80665; // Yerçekimi ivmesi

    if (isNaN(m) || m <= 0) {
        alert('Lütfen geçerli ve pozitif bir kütle değeri giriniz.');
        return;
    }

    let fn = 0;
    let fg = m * g; // yerçekimi kuvveti

    if (surface === 'horizontal') {
        // FN = m * g + F_dış
        fn = fg + extForce;
    } else {
        const angleDeg = parseFloat(document.getElementById('hc-nf-angle').value);
        if (isNaN(angleDeg) || angleDeg < 0 || angleDeg >= 90) {
            alert('Eğik düzlem açısı 0 ile 90 derece arasında olmalıdır.');
            return;
        }
        
        const rad = angleDeg * (Math.PI / 180);
        // FN = m * g * cos(theta) + F_dış
        fn = (fg * Math.cos(rad)) + extForce;
    }

    if (fn < 0) {
        fn = 0; // Cismin teması kesilmiştir
    }

    // Tahmini statik sürtünme sınırı (mu = 0.3)
    const fsMax = fn * 0.3;

    document.getElementById('hc-nf-val').innerText = fn.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' N';
    document.getElementById('hc-nf-gravity-val').innerText = fg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-nf-friction-limit-val').innerText = fsMax.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';

    document.getElementById('hc-normal-kuvvet-result').classList.add('visible');
}
