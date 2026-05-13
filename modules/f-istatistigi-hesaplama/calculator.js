function hcFStatHesapla() {
    const s1 = parseFloat(document.getElementById('hc-f-s1').value);
    const s2 = parseFloat(document.getElementById('hc-f-s2').value);

    if (isNaN(s1) || isNaN(s2) || s1 <= 0 || s2 <= 0) {
        alert('Lütfen geçerli pozitif varyans değerleri girin.');
        return;
    }

    // Usually F is calculated as larger variance / smaller variance
    const f = s1 >= s2 ? s1 / s2 : s2 / s1;
    
    document.getElementById('hc-res-f-val').innerText = f.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    
    document.getElementById('hc-f-desc').innerText = s1 >= s2 
        ? "1. Grup varyansı pay olarak kullanıldı." 
        : "2. Grup varyansı pay olarak kullanıldı (Daima ≥ 1).";

    document.getElementById('hc-f-istatistigi-result').classList.add('visible');
}
