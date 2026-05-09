function hcKSHesapla() {
    const ca = parseFloat(document.getElementById('hc-ks-ca').value);

    if (isNaN(ca)) {
        alert('Lütfen kalsiyum derişimini giriniz.');
        return;
    }

    // CaCO3 equivalent = Ca * (MW_CaCO3 / MW_Ca) = Ca * (100.0869 / 40.078) ≈ 2.497
    const hardness = ca * 2.49735;

    document.getElementById('hc-ks-val').innerText = hardness.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mg/L CaCO₃';
    document.getElementById('hc-ks-result').classList.add('visible');
}
