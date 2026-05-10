function hcGradeCalcHesapla() {
    const rise = parseFloat(document.getElementById('hc-gc-rise').value);
    const run = parseFloat(document.getElementById('hc-gc-run').value);

    if (!rise || !run) {
        alert('Lütfen ölçüleri giriniz.');
        return;
    }

    const percentage = (rise / run) * 100;
    const degrees = Math.atan(rise / run) * (180 / Math.PI);

    const resVal = document.getElementById('hc-gc-res-val');
    resVal.innerText = `%${percentage.toFixed(2).toLocaleString('tr-TR')}`;

    const resDeg = document.getElementById('hc-gc-res-deg');
    resDeg.innerText = `Eğim Açısı: ${degrees.toFixed(2)}°`;

    document.getElementById('hc-grade-result').classList.add('visible');
}
