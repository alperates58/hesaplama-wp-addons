function hcMicMagHesapla() {
    const ocular = parseFloat(document.getElementById('hc-mm-ocular').value);
    const objective = parseFloat(document.getElementById('hc-mm-obj').value);

    if (!ocular || !objective) {
        alert('Lütfen lens değerlerini giriniz.');
        return;
    }

    const total = ocular * objective;

    const resVal = document.getElementById('hc-mm-res-val');
    resVal.innerText = total.toLocaleString('tr-TR');

    document.getElementById('hc-mic-mag-result').classList.add('visible');
}
