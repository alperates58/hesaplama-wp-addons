function hcVmaxHesapla() {
    const v = parseFloat(document.getElementById('hc-vm-v').value);
    const s = parseFloat(document.getElementById('hc-vm-s').value);
    const km = parseFloat(document.getElementById('hc-vm-km').value);

    if (isNaN(v) || isNaN(s) || isNaN(km)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Michaelis-Menten: v = (Vmax * [S]) / (Km + [S])
    // Vmax = v * (Km + [S]) / [S]
    const vmax = (v * (km + s)) / s;

    const resVal = document.getElementById('hc-vm-res-val');
    resVal.innerText = vmax.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-vmax-calc-result').classList.add('visible');
}
