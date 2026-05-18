function hcMomentumKorunumuHesapla() {
    const type = document.getElementById('hc-mc-type').value;
    
    const m1 = parseFloat(document.getElementById('hc-mc-m1').value);
    const v1i = parseFloat(document.getElementById('hc-mc-v1').value);
    
    const m2 = parseFloat(document.getElementById('hc-mc-m2').value);
    const v2i = parseFloat(document.getElementById('hc-mc-v2').value);

    if (isNaN(m1) || isNaN(v1i) || isNaN(m2) || isNaN(v2i) || m1 <= 0 || m2 <= 0) {
        alert('Lütfen geçerli kütle (pozitif) ve hız değerleri giriniz.');
        return;
    }

    // İlk kinetik enerji
    const ke1i = 0.5 * m1 * Math.pow(v1i, 2);
    const ke2i = 0.5 * m2 * Math.pow(v2i, 2);
    const keTotalInitial = ke1i + ke2i;

    // İlk momentum
    const pTotal = (m1 * v1i) + (m2 * v2i);

    let v1f = 0;
    let v2f = 0;
    let resultText = '';
    let keTotalFinal = 0;

    if (type === 'inelastic') {
        // Ortak hız: vf = (m1 * v1i + m2 * v2i) / (m1 + m2)
        const vf = pTotal / (m1 + m2);
        v1f = vf;
        v2f = vf;
        
        keTotalFinal = 0.5 * (m1 + m2) * Math.pow(vf, 2);
        resultText = `Ortak Son Hız (v_ort): ${vf.toLocaleString('tr-TR', { maximumFractionDigits: 3 })} m/s`;
    } else {
        // Esnek çarpışma son hızları
        v1f = ((m1 - m2) / (m1 + m2)) * v1i + ((2 * m2) / (m1 + m2)) * v2i;
        v2f = ((2 * m1) / (m1 + m2)) * v1i + ((m2 - m1) / (m1 + m2)) * v2i;

        keTotalFinal = (0.5 * m1 * Math.pow(v1f, 2)) + (0.5 * m2 * Math.pow(v2f, 2));
        resultText = `1. Cisim Son Hızı (v₁f): ${v1f.toLocaleString('tr-TR', { maximumFractionDigits: 3 })} m/s <br>
                      2. Cisim Son Hızı (v₂f): ${v2f.toLocaleString('tr-TR', { maximumFractionDigits: 3 })} m/s`;
    }

    const keLost = keTotalInitial - keTotalFinal;

    document.getElementById('hc-mc-result-val').innerHTML = resultText;
    document.getElementById('hc-mc-kei-val').innerText = keTotalInitial.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' J';
    document.getElementById('hc-mc-kef-val').innerText = keTotalFinal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' J';
    document.getElementById('hc-mc-kelost-val').innerText = Math.abs(keLost).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' J (' + (keLost > 0.001 ? 'Kayıp/Isıya Dönüşen' : 'Korundu') + ')';
    document.getElementById('hc-mc-pi-val').innerText = pTotal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg·m/s';

    document.getElementById('hc-momentum-korunumu-result').classList.add('visible');
}
