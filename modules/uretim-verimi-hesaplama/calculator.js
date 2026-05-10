function hcÜretimVerimiHesapla() {
    const theoretical = parseFloat(document.getElementById('hc-y-theoretical').value);
    const actual = parseFloat(document.getElementById('hc-y-actual').value);

    if (!theoretical || isNaN(actual)) return;

    // Verim = (Gerçek / Teorik) * 100
    const yieldP = (actual / theoretical) * 100;

    document.getElementById('hc-y-val').innerText = '% ' + yieldP.toFixed(2);
    document.getElementById('hc-y-result').classList.add('visible');
}
