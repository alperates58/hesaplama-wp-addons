function hcTargetRunPaceHesapla() {
    const dist = parseFloat(document.getElementById('hc-trt-dist').value);
    const hr = parseInt(document.getElementById('hc-trt-hr').value || 0);
    const min = parseInt(document.getElementById('hc-trt-min').value || 0);
    const sec = parseInt(document.getElementById('hc-trt-sec').value || 0);

    if (!dist || (!hr && !min && !sec)) {
        alert('Lütfen mesafe ve hedef süre bilgilerini giriniz.');
        return;
    }

    const totalMinutes = (hr * 60) + min + (sec / 60);
    const paceDecimal = totalMinutes / dist;
    
    const pMin = Math.floor(paceDecimal);
    const pSec = Math.round((paceDecimal - pMin) * 60);

    const resVal = document.getElementById('hc-trt-res-val');
    resVal.innerText = `${pMin}:${pSec < 10 ? '0' + pSec : pSec}`;

    document.getElementById('hc-target-run-pace-result').classList.add('visible');
}
