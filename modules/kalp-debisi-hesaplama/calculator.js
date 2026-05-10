function hcKalpDebisiHesapla() {
    const hr = parseFloat(document.getElementById('hc-co-hr').value);
    const sv = parseFloat(document.getElementById('hc-co-sv').value);

    if (!hr || !sv) return;

    // CO = HR * SV
    const co = (hr * sv) / 1000; // Litreye çevir

    document.getElementById('hc-co-val').innerText = co.toFixed(2) + ' L/dk';
    document.getElementById('hc-co-result').classList.add('visible');
}
