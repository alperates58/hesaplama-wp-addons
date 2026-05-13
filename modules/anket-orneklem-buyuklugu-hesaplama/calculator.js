function hcSampleSizeHesapla() {
    const pop = parseFloat(document.getElementById('hc-ss-pop').value) || Infinity;
    const z = parseFloat(document.getElementById('hc-ss-conf').value);
    const error = parseFloat(document.getElementById('hc-ss-error').value) / 100;

    if (isNaN(z) || isNaN(error) || error <= 0) {
        alert('Lütfen geçerli bir hata payı girin.');
        return;
    }

    const p = 0.5;
    const q = 0.5;

    // Infinite population formula
    let n = (Math.pow(z, 2) * p * q) / Math.pow(error, 2);

    // Finite population correction
    if (pop !== Infinity && pop > 0) {
        n = n / (1 + (n - 1) / pop);
    }

    const result = Math.ceil(n);

    document.getElementById('hc-res-ss-val').innerText = result.toLocaleString('tr-TR') + " Kişi";
    document.getElementById('hc-anket-orneklem-buyuklugu-hesaplama-result').classList.add('visible');
}
