function hcSeriSeyreltmeHesapla() {
    const start = parseFloat(document.getElementById('hc-ss-start').value);
    const sample = parseFloat(document.getElementById('hc-ss-sample').value);
    const diluent = parseFloat(document.getElementById('hc-ss-diluent').value);
    const steps = parseInt(document.getElementById('hc-ss-steps').value);

    if (isNaN(start) || isNaN(sample) || isNaN(diluent) || isNaN(steps) || start <= 0 || sample <= 0 || diluent < 0 || steps < 1) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const factor = sample / (sample + diluent);
    const finalVal = start * Math.pow(factor, steps);

    document.getElementById('hc-ss-val').innerText = finalVal.toExponential(4);
    document.getElementById('hc-ss-note').innerText = `Her adımda 1:${(1/factor).toLocaleString('tr-TR')} oranında seyreltme yapılmıştır. Toplam seyreltme faktörü: ${(1/Math.pow(factor, steps)).toExponential(2)}`;
    document.getElementById('hc-ss-result').classList.add('visible');
}
