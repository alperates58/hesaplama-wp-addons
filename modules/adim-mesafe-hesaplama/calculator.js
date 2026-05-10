function hcStepDistHesapla() {
    const steps = parseInt(document.getElementById('hc-sd-steps').value);
    const stepLen = parseFloat(document.getElementById('hc-sd-len').value);

    if (!steps || !stepLen) {
        alert('Lütfen bilgileri giriniz.');
        return;
    }

    const distKm = (steps * stepLen) / 100000;

    const resVal = document.getElementById('hc-sd-res-val');
    resVal.innerText = distKm.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-step-dist-result').classList.add('visible');
}
