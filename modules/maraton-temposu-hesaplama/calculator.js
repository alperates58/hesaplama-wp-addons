function hcMarathonPaceHesapla() {
    const hr = parseInt(document.getElementById('hc-mp-hr').value || 0);
    const min = parseInt(document.getElementById('hc-mp-min').value || 0);
    const dist = 42.195;

    if (!hr && !min) {
        alert('Lütfen hedef sürenizi giriniz.');
        return;
    }

    const totalMinutes = (hr * 60) + min;
    const paceDecimal = totalMinutes / dist;
    
    const paceMin = Math.floor(paceDecimal);
    const paceSec = Math.round((paceDecimal - paceMin) * 60);

    const resVal = document.getElementById('hc-mp-res-val');
    resVal.innerText = `${paceMin}:${paceSec < 10 ? '0' + paceSec : paceSec}`;

    document.getElementById('hc-marathon-pace-result').classList.add('visible');
}
