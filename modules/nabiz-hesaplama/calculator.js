function hcHrSimpleHesapla() {
    const count = parseInt(document.getElementById('hc-hrs-count').value);
    const seconds = parseInt(document.getElementById('hc-hrs-seconds').value);

    if (!count) {
        alert('Lütfen atım sayısını giriniz.');
        return;
    }

    // BPM = (Atım / Saniye) * 60
    const bpm = (count / seconds) * 60;

    const resVal = document.getElementById('hc-hrs-res-val');
    resVal.innerText = Math.round(bpm);

    document.getElementById('hc-hr-simple-result').classList.add('visible');
}
