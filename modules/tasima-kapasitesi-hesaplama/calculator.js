function hcCarryCapHesapla() {
    const area = parseFloat(document.getElementById('hc-cc-area').value);
    const factor = parseFloat(document.getElementById('hc-cc-resource').value);

    if (!area || !factor) {
        alert('Lütfen alan ve verimlilik değerlerini giriniz.');
        return;
    }

    // K = Alan * Verimlilik Faktörü
    const k = area * factor;

    const resVal = document.getElementById('hc-cc-res-val');
    resVal.innerText = Math.round(k).toLocaleString('tr-TR');

    document.getElementById('hc-carry-cap-result').classList.add('visible');
}
