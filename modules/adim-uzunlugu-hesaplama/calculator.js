function hcStrideLenHesapla() {
    const dist = parseFloat(document.getElementById('hc-sl-dist').value);
    const steps = parseInt(document.getElementById('hc-sl-steps').value);

    if (!dist || !steps) {
        alert('Lütfen mesafe ve adım sayısını giriniz.');
        return;
    }

    // Stride Length (cm) = (Distance in meters * 100) / Steps
    const strideLen = (dist * 100) / steps;

    const resVal = document.getElementById('hc-sl-res-val');
    resVal.innerText = Math.round(strideLen);

    document.getElementById('hc-stride-len-result').classList.add('visible');
}
