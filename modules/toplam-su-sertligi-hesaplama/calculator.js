function hcToplamSuSertliğiHesapla() {
    const ca = parseFloat(document.getElementById('hc-th-ca').value) || 0;
    const mg = parseFloat(document.getElementById('hc-th-mg').value) || 0;

    // Toplam Sertlik (mg/L CaCO3) = [Ca * 2.497] + [Mg * 4.118]
    const total = (ca * 2.497) + (mg * 4.118);

    document.getElementById('hc-th-val').innerText = Math.round(total).toLocaleString('tr-TR') + ' mg/L CaCO₃';
    document.getElementById('hc-th-result').classList.add('visible');
}
