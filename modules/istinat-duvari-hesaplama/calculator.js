function hcRetainingWallHesapla() {
    const L = parseFloat(document.getElementById('hc-rw-length').value);
    const H = parseFloat(document.getElementById('hc-rw-height').value);
    const type = document.getElementById('hc-rw-type').value;

    if (!L || !H) {
        alert('Lütfen uzunluk ve yükseklik bilgilerini giriniz.');
        return;
    }

    const area = L * H;
    const resVal = document.getElementById('hc-rw-res-val');
    const resUnit = document.getElementById('hc-rw-res-unit');

    if (type === 'concrete') {
        const thick = parseFloat(document.getElementById('hc-rw-thick').value);
        if (!thick) { alert('Lütfen kalınlık giriniz.'); return; }
        const vol = area * (thick / 100);
        resVal.innerText = vol.toFixed(2).toLocaleString('tr-TR');
        resUnit.innerText = "Metreküp (m³)";
    } else {
        const blockSize = parseFloat(type);
        const count = Math.ceil(area / blockSize);
        resVal.innerText = count.toLocaleString('tr-TR');
        resUnit.innerText = "Adet Blok";
    }

    document.getElementById('hc-ret-wall-result').classList.add('visible');
}
