function hcOsmolariteHesapla() {
    const molar = parseFloat(document.getElementById('hc-os-molar').value);
    const i = parseFloat(document.getElementById('hc-os-i').value);

    if (!molar || !i) return;

    // Osmolarite = M * i
    const osmolarity = molar * i;

    document.getElementById('hc-os-val').innerText = osmolarity.toFixed(4) + ' Osm/L';
    document.getElementById('hc-os-result').classList.add('visible');
}
