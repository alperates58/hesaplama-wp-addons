function hcOsmolaliteHesapla() {
    const molal = parseFloat(document.getElementById('hc-om-mol').value);
    const i = parseFloat(document.getElementById('hc-om-i').value);

    if (!molal || !i) return;

    // Osmolalite = m * i
    const osmolality = molal * i;

    document.getElementById('hc-om-val').innerText = osmolality.toFixed(4) + ' Osm/kg';
    document.getElementById('hc-om-result').classList.add('visible');
}
