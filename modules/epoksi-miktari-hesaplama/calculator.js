function hcEpoxyCalcHesapla() {
    const area = parseFloat(document.getElementById('hc-ec-area').value);
    const thick = parseFloat(document.getElementById('hc-ec-thick').value);

    if (!area || !thick) {
        alert('Lütfen alan ve kalınlık bilgilerini giriniz.');
        return;
    }

    // Approx consumption: 1.1 kg per m2 per mm thickness
    const totalWeight = area * thick * 1.1;

    const resVal = document.getElementById('hc-ec-res-val');
    resVal.innerText = totalWeight.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-epoxy-calc-result').classList.add('visible');
}
