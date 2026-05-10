function hcKFactorHesapla() {
    const T = parseFloat(document.getElementById('hc-kf-thick').value);
    const R = parseFloat(document.getElementById('hc-kf-radius').value);

    if (!T || !R) {
        alert('Lütfen kalınlık ve yarıçap giriniz.');
        return;
    }

    // Ratio R/T
    const ratio = R / T;
    let K = 0;

    if (ratio < 0.65) K = 0.33;
    else if (ratio < 1) K = 0.40;
    else if (ratio < 1.5) K = 0.45;
    else K = 0.50;

    const resVal = document.getElementById('hc-kf-res-val');
    resVal.innerText = K.toFixed(2);

    document.getElementById('hc-kf-msg').innerText = `R/T Oranı: ${ratio.toFixed(2)}`;
    document.getElementById('hc-k-factor-result').classList.add('visible');
}
