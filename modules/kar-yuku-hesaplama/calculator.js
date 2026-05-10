function hcSnowLoadHesapla() {
    const area = parseFloat(document.getElementById('hc-sl-area').value);
    const depth = parseFloat(document.getElementById('hc-sl-depth').value);
    const density = parseFloat(document.getElementById('hc-sl-type').value);

    if (!area || !depth) {
        alert('Lütfen alan ve kar kalınlığı bilgilerini giriniz.');
        return;
    }

    // Load = Area * Depth(m) * Density
    const totalLoad = area * (depth / 100) * density;

    const resVal = document.getElementById('hc-sl-res-val');
    resVal.innerText = Math.round(totalLoad).toLocaleString('tr-TR');

    document.getElementById('hc-snow-result').classList.add('visible');
}
