function hcForceTypeChange() {
    const type = document.getElementById('hc-force-type').value;
    document.getElementById('hc-force-mechanic-fields').style.display = type === 'mechanic' ? 'block' : 'none';
    document.getElementById('hc-force-coulomb-fields').style.display = type === 'coulomb' ? 'block' : 'none';
}

function hcKuvvetHesapla() {
    const type = document.getElementById('hc-force-type').value;
    let force = 0;
    let details = '';

    if (type === 'mechanic') {
        const m = parseFloat(document.getElementById('hc-force-m').value);
        const a = parseFloat(document.getElementById('hc-force-a').value);
        
        if (isNaN(m) || isNaN(a)) {
            alert('Lütfen kütle ve ivme değerlerini giriniz.');
            return;
        }

        force = m * a;
        details = `Mekanik Kuvvet Formülü: F = m &times; a = ${m.toLocaleString('tr-TR')} kg &times; ${a.toLocaleString('tr-TR')} m/s² = ${force.toLocaleString('tr-TR')} N`;
    } else {
        const q1 = parseFloat(document.getElementById('hc-force-q1').value); // microCoulomb
        const q2 = parseFloat(document.getElementById('hc-force-q2').value); // microCoulomb
        const r = parseFloat(document.getElementById('hc-force-r').value); // m

        if (isNaN(q1) || isNaN(q2) || !r || r <= 0) {
            alert('Lütfen yük değerlerini girin ve mesafeyi sıfırdan büyük bir sayı olarak girin.');
            return;
        }

        const k = 8.98755e9; // N m^2 / C^2
        const q1C = q1 * 1e-6; // C
        const q2C = q2 * 1e-6; // C

        // Coulomb formülü: F = k * |q1 * q2| / r^2
        force = k * Math.abs(q1C * q2C) / Math.pow(r, 2);
        
        const direction = (q1 * q2 < 0) ? 'Çekme Kuvveti' : 'İtme Kuvveti';
        details = `Coulomb Yasası Formülü: F = k &times; |q₁ &times; q₂| / r² <br>
                   Yükler zıt işaretli olduğundan oluşan kuvvet bir <strong>${direction}</strong>dir.`;
    }

    document.getElementById('hc-force-val').innerText = force.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' N';
    document.getElementById('hc-force-details').innerHTML = details;
    document.getElementById('hc-kuvvet-result').classList.add('visible');
}
