function hcRunDistTimeHesapla() {
    const dist = parseFloat(document.getElementById('hc-rdt-dist').value);
    const min = parseInt(document.getElementById('hc-rdt-min').value || 0);
    const sec = parseInt(document.getElementById('hc-rdt-sec').value || 0);

    if (!dist || (!min && !sec)) {
        alert('Lütfen mesafe ve tempo bilgilerini giriniz.');
        return;
    }

    const paceInSeconds = (min * 60) + sec;
    const totalSeconds = dist * paceInSeconds;

    const hr = Math.floor(totalSeconds / 3600);
    const m = Math.floor((totalSeconds % 3600) / 60);
    const s = Math.round(totalSeconds % 60);

    const resVal = document.getElementById('hc-rdt-res-val');
    resVal.innerText = (hr > 0 ? hr + ":" : "") + (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s);

    document.getElementById('hc-run-dist-time-result').classList.add('visible');
}
