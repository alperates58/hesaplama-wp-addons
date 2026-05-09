function hcKHesapla() {
    const hco3 = parseFloat(document.getElementById('hc-kh-hco3').value);
    const co3 = parseFloat(document.getElementById('hc-kh-co3').value);

    if (isNaN(hco3) || isNaN(co3)) {
        alert('Lütfen derişim değerlerini giriniz.');
        return;
    }

    // Alkalinity (meq/L) = [HCO3-]/61.017 + 2*[CO3--]/60.009
    const alkMeq = (hco3 / 61.017) + (2 * co3 / 60.009);
    
    // Carbonate Hardness (mg/L CaCO3) = Alkalinity (meq/L) * 50.043
    const khMg = alkMeq * 50.043;
    
    // 1 °dH = 17.848 mg/L CaCO3
    const khDh = khMg / 17.848;

    document.getElementById('hc-kh-val-mg').innerText = khMg.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-kh-val-dh').innerText = khDh.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-kh-result').classList.add('visible');
}
