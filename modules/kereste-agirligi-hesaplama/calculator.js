function hcLumberWeightHesapla() {
    const vol = parseFloat(document.getElementById('hc-lw-vol').value);
    const density = parseFloat(document.getElementById('hc-lw-type').value);

    if (!vol) {
        alert('Lütfen hacmi giriniz.');
        return;
    }

    const weight = vol * density;

    const resVal = document.getElementById('hc-lw-res-val');
    resVal.innerText = Math.round(weight).toLocaleString('tr-TR');

    document.getElementById('hc-lumber-weight-result').classList.add('visible');
}
