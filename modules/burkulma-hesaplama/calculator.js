function hcBurkulmaHesapla() {
    const E_gpa = parseFloat(document.getElementById('hc-bur-e').value); // GPa
    const I_cm4 = parseFloat(document.getElementById('hc-bur-i').value); // cm4
    const L = parseFloat(document.getElementById('hc-bur-l').value); // m
    const K = parseFloat(document.getElementById('hc-bur-k').value);

    if (isNaN(E_gpa) || isNaN(I_cm4) || isNaN(L) || L <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Birim dönüşümleri
    // E: GPa -> N/m2 (1 GPa = 10^9 N/m2)
    const E = E_gpa * 1e9;
    // I: cm4 -> m4 (1 cm4 = 10^-8 m4)
    const I = I_cm4 * 1e-8;

    // Pcr = (pi^2 * E * I) / (K * L)^2
    const Pcr = (Math.PI * Math.PI * E * I) / Math.pow(K * L, 2); // Newton

    const Pcr_kn = Pcr / 1000;
    const Pcr_kg = Pcr_kn * 101.97; // 1 kN ~ 101.97 kg

    document.getElementById('hc-bur-res-kn').innerText = Pcr_kn.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kN';
    document.getElementById('hc-bur-res-kg').innerText = Math.round(Pcr_kg).toLocaleString('tr-TR') + ' kg (yaklaşık)';
    
    document.getElementById('hc-bur-result').classList.add('visible');
}
