function hcMarathonFinishHesapla() {
    const min = parseInt(document.getElementById('hc-mf-min').value || 0);
    const sec = parseInt(document.getElementById('hc-mf-sec').value || 0);
    const dist = 42.195;

    if (!min && !sec) {
        alert('Lütfen temponuzu giriniz.');
        return;
    }

    const paceInSeconds = (min * 60) + sec;
    const totalSeconds = dist * paceInSeconds;

    const hr = Math.floor(totalSeconds / 3600);
    const m = Math.floor((totalSeconds % 3600) / 60);
    const s = Math.round(totalSeconds % 60);

    const resVal = document.getElementById('hc-mf-res-val');
    resVal.innerText = `${hr}:${m < 10 ? '0' + m : m}:${s < 10 ? '0' + s : s}`;

    document.getElementById('hc-marathon-finish-result').classList.add('visible');
}
