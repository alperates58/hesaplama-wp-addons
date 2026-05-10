function hcİşeGidişGelişKarbonAyakİziHesapla() {
    const dist = parseFloat(document.getElementById('hc-cm-dist').value);
    const factor = parseFloat(document.getElementById('hc-cm-type').value);
    const days = parseFloat(document.getElementById('hc-cm-days').value);

    if (!dist || isNaN(factor) || !days) return;

    // Yıllık ~48 hafta çalışma baz alınır
    const yearlyDist = dist * days * 48;
    const yearlyCo2 = yearlyDist * factor;

    document.getElementById('hc-cm-val').innerText = Math.round(yearlyCo2).toLocaleString('tr-TR') + ' kg CO₂e';
    document.getElementById('hc-cm-info').innerText = `Bu emisyonu dengelemek için yılda yaklaşık ${Math.ceil(yearlyCo2 / 20)} ağaç dikmeniz gerekir.`;
    document.getElementById('hc-cm-result').classList.add('visible');
}
