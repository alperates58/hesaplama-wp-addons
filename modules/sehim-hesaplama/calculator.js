function hcDeflectionHesapla() {
    const P = parseFloat(document.getElementById('hc-ds-load').value);
    const L = parseFloat(document.getElementById('hc-ds-len').value);
    const E = parseFloat(document.getElementById('hc-ds-modulus').value) * 1000; // Convert GPa to N/mm2
    const I = parseFloat(document.getElementById('hc-ds-inertia').value);

    if (!P || !L || !E || !I) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Formula for central point load on simple beam: (P * L^3) / (48 * E * I)
    const delta = (P * Math.pow(L, 3)) / (48 * E * I);

    const resVal = document.getElementById('hc-ds-res-val');
    resVal.innerText = delta.toFixed(3).toLocaleString('tr-TR');

    document.getElementById('hc-deflection-result').classList.add('visible');
}
