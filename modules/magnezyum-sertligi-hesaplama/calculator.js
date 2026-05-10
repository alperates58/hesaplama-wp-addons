function hcMagnezyumSertliğiHesapla() {
    const mg = parseFloat(document.getElementById('hc-mh-mg').value);

    if (!mg) return;

    // Mg sertliği (as CaCO3) = Mg (mg/L) * (MW CaCO3 / MW Mg)
    // = Mg * (100.08 / 24.305) = Mg * 4.118
    const hardness = mg * 4.118;

    document.getElementById('hc-mh-val').innerText = Math.round(hardness).toLocaleString('tr-TR') + ' mg/L CaCO₃';
    document.getElementById('hc-mh-result').classList.add('visible');
}
