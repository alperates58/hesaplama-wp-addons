function hcTriTimeHesapla() {
    const swimM = parseInt(document.getElementById('hc-tt-swim-m').value || 0);
    const swimS = parseInt(document.getElementById('hc-tt-swim-s').value || 0);
    const bikeH = parseInt(document.getElementById('hc-tt-bike-h').value || 0);
    const bikeM = parseInt(document.getElementById('hc-tt-bike-m').value || 0);
    const runM = parseInt(document.getElementById('hc-tt-run-m').value || 0);
    const runS = parseInt(document.getElementById('hc-tt-run-s').value || 0);
    const tTrans = parseInt(document.getElementById('hc-tt-t').value || 0);

    const totalSeconds = (swimM * 60) + swimS + (bikeH * 3600) + (bikeM * 60) + (runM * 60) + runS + (tTrans * 60);

    const h = Math.floor(totalSeconds / 3600);
    const m = Math.floor((totalSeconds % 3600) / 60);
    const s = Math.round(totalSeconds % 60);

    const resVal = document.getElementById('hc-tt-res-val');
    resVal.innerText = `${h}:${m < 10 ? '0' + m : m}:${s < 10 ? '0' + s : s}`;

    document.getElementById('hc-tri-time-result').classList.add('visible');
}
