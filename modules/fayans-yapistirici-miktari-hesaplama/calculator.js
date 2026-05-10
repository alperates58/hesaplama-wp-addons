function hcTileAdhesiveHesapla() {
    const area = parseFloat(document.getElementById('hc-ta-area').value);
    const consumption = parseFloat(document.getElementById('hc-ta-notch').value);

    if (!area) {
        alert('Lütfen alanı giriniz.');
        return;
    }

    const totalWeight = area * consumption;
    const bags = Math.ceil(totalWeight / 25); // Standard 25kg bag

    const resVal = document.getElementById('hc-ta-res-val');
    resVal.innerText = Math.round(totalWeight).toLocaleString('tr-TR');

    const resBags = document.getElementById('hc-ta-res-bags');
    resBags.innerText = `Yaklaşık ${bags} Torba (25 kg'lık)`;

    document.getElementById('hc-tile-adhesive-result').classList.add('visible');
}
