function hcLensTypeChange() {
    const type = document.getElementById('hc-lens-type').value;
    document.getElementById('hc-lens-thickness-group').style.display = type === 'thick' ? 'block' : 'none';
}

function hcMercekYapımcıDenklemiHesapla() {
    const type = document.getElementById('hc-lens-type').value;
    const n = parseFloat(document.getElementById('hc-lens-n').value);
    const nMed = parseFloat(document.getElementById('hc-lens-n-medium').value);
    
    // Girdiler cm cinsinden, metre cinsine çevireceğiz
    const r1 = parseFloat(document.getElementById('hc-lens-r1').value) / 100;
    const r2 = parseFloat(document.getElementById('hc-lens-r2').value) / 100;
    const d = parseFloat(document.getElementById('hc-lens-thickness').value) / 100 || 0;

    if (isNaN(n) || isNaN(nMed) || isNaN(r1) || isNaN(r2) || nMed <= 0 || n <= 0 || r1 === 0 || r2 === 0) {
        alert('Lütfen tüm indis ve yarıçap değerlerini sıfırdan farklı olacak şekilde giriniz.');
        return;
    }

    if (type === 'thick' && (isNaN(d) || d < 0)) {
        alert('Lütfen geçerli bir mercek kalınlığı giriniz.');
        return;
    }

    // Göreceli kırılma indisi
    const nRel = n / nMed;

    // Lensmaker's equation: 1/f = (nRel - 1) * (1/R1 - 1/R2 + ((nRel - 1) * d) / (nRel * R1 * R2))
    let invF = 0;
    if (type === 'thin') {
        invF = (nRel - 1) * ((1 / r1) - (1 / r2));
    } else {
        invF = (nRel - 1) * ((1 / r1) - (1 / r2) + ((nRel - 1) * d) / (nRel * r1 * r2));
    }

    if (Math.abs(invF) < 1e-9) {
        document.getElementById('hc-lens-f-val').innerText = 'Sonsuz (Düz Cam Etkisi)';
        document.getElementById('hc-lens-power-val').innerText = '0 D';
        document.getElementById('hc-lens-class-val').innerText = 'Nötr / Odaklama Yapmaz';
    } else {
        const fMeters = 1 / invF;
        const fCm = fMeters * 100;
        const power = invF; // 1 / f in meters

        document.getElementById('hc-lens-f-val').innerText = fCm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
        document.getElementById('hc-lens-power-val').innerText = power.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' D';
        document.getElementById('hc-lens-class-val').innerText = power > 0 ? 'İnce Kenarlı (Yakınsak / Toplayıcı) Mercek' : 'Kalın Kenarlı (Iraksak / Dağıtıcı) Mercek';
    }

    document.getElementById('hc-mercek-yapimci-denklemi-result').classList.add('visible');
}
