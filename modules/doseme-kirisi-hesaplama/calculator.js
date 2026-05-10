function hcJoistCalcHesapla() {
    const L = parseFloat(document.getElementById('hc-jc-length').value);
    const S = parseFloat(document.getElementById('hc-jc-spacing').value) / 100;

    if (!L) {
        alert('Lütfen uzunluğu giriniz.');
        return;
    }

    const count = Math.ceil(L / S) + 1;

    const resVal = document.getElementById('hc-jc-res-val');
    resVal.innerText = count;

    document.getElementById('hc-joist-result').classList.add('visible');
}
