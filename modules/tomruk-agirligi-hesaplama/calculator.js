function hcLogWeightHesapla() {
    const L = parseFloat(document.getElementById('hc-log-l').value);
    const D = parseFloat(document.getElementById('hc-log-d').value);
    const density = parseFloat(document.getElementById('hc-log-type').value);

    if (!L || !D) {
        alert('Lütfen boy ve çap bilgilerini giriniz.');
        return;
    }

    // Cylinder Volume = PI * r^2 * L
    const r = (D / 100) / 2;
    const vol = Math.PI * Math.pow(r, 2) * L;
    const weight = vol * density;

    const resVal = document.getElementById('hc-log-res-val');
    resVal.innerText = Math.round(weight).toLocaleString('tr-TR');

    document.getElementById('hc-log-weight-result').classList.add('visible');
}
