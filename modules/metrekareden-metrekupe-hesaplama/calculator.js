function hcSqmToCumHesapla() {
    const area = parseFloat(document.getElementById('hc-sc-area').value);
    const depth = parseFloat(document.getElementById('hc-sc-depth').value);

    if (!area || !depth) {
        alert('Lütfen alan ve derinlik bilgilerini giriniz.');
        return;
    }

    const vol = area * (depth / 100);

    const resVal = document.getElementById('hc-sc-res-val');
    resVal.innerText = vol.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });

    document.getElementById('hc-sqm-cum-result').classList.add('visible');
}
