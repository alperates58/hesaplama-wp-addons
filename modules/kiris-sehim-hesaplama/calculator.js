function hcBeamDeflectionHesapla() {
    const w = parseFloat(document.getElementById('hc-bd-load').value);
    const L = parseFloat(document.getElementById('hc-bd-len').value);
    const E = parseFloat(document.getElementById('hc-bd-modulus').value) * 1000;
    const I = parseFloat(document.getElementById('hc-bd-inertia').value);

    if (!w || !L || !E || !I) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Formula for UDL on simple beam: (5 * w * L^4) / (384 * E * I)
    const delta = (5 * w * Math.pow(L, 4)) / (384 * E * I);

    const resVal = document.getElementById('hc-bd-res-val');
    resVal.innerText = delta.toFixed(3).toLocaleString('tr-TR');

    document.getElementById('hc-beam-defl-result').classList.add('visible');
}
