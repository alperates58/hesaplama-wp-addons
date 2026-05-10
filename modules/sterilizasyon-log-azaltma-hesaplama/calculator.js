function hcLogRedHesapla() {
    const before = parseFloat(document.getElementById('hc-lr-before').value);
    const after = parseFloat(document.getElementById('hc-lr-after').value);

    if (!before || isNaN(after)) {
        alert('Lütfen sayıları giriniz.');
        return;
    }

    // Log Reduction = log10(N0 / N)
    const logRed = Math.log10(before / (after || 1e-10)); // Sıfıra bölme hatasını önlemek için küçük değer
    const percent = (1 - (after / before)) * 100;

    const resVal = document.getElementById('hc-lr-res-val');
    const resPerc = document.getElementById('hc-lr-res-perc');

    resVal.innerText = logRed.toFixed(2).toLocaleString('tr-TR');
    resPerc.innerText = "Öldürme Yüzdesi: %" + percent.toFixed(6);

    document.getElementById('hc-log-red-result').classList.add('visible');
}
