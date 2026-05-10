function hcKompostHesapla() {
    const area = parseFloat(document.getElementById('hc-km-area').value);
    const depthCm = parseFloat(document.getElementById('hc-km-depth').value);

    if (!area || !depthCm) {
        alert('Lütfen alan ve derinlik bilgilerini giriniz.');
        return;
    }

    // Hacim (m3) = Alan (m2) * Derinlik (m)
    // Hacim (Litre) = Hacim (m3) * 1000
    const volumeLiters = area * (depthCm / 100) * 1000;

    const resVal = document.getElementById('hc-km-res-val');
    resVal.innerText = Math.round(volumeLiters).toLocaleString('tr-TR');

    document.getElementById('hc-kompost-miktar-result').classList.add('visible');
}
