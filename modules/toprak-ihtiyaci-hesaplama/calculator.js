function hcSoilVolHesapla() {
    const area = parseFloat(document.getElementById('hc-sv-area').value);
    const depthCm = parseFloat(document.getElementById('hc-sv-depth').value);

    if (!area || !depthCm) {
        alert('Lütfen alan ve derinlik bilgilerini giriniz.');
        return;
    }

    // Hacim (m3) = Alan (m2) * Derinlik (m)
    const volume = area * (depthCm / 100);

    const resVal = document.getElementById('hc-sv-res-val');
    resVal.innerText = volume.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-soil-vol-result').classList.add('visible');
}
