function hcStepToKmHesapla() {
    const steps = parseInt(document.getElementById('hc-sk-steps').value);
    const height = parseInt(document.getElementById('hc-sk-height').value);

    if (!steps || !height) {
        alert('Lütfen adım sayısını ve boyunuzu giriniz.');
        return;
    }

    // Average stride length = height * 0.415
    const strideLengthCm = height * 0.415;
    const totalCm = steps * strideLengthCm;
    const totalKm = totalCm / 100000;

    const resVal = document.getElementById('hc-sk-res-val');
    resVal.innerText = totalKm.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-step-to-km-result').classList.add('visible');
}
