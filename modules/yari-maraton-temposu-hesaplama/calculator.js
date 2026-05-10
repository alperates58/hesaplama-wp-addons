function hcHalfPaceHesapla() {
    const hr = parseInt(document.getElementById('hc-hmp-hr').value || 0);
    const min = parseInt(document.getElementById('hc-hmp-min').value || 0);
    const dist = 21.097;

    if (!hr && !min) {
        alert('Lütfen hedef sürenizi giriniz.');
        return;
    }

    const totalMinutes = (hr * 60) + min;
    const paceDecimal = totalMinutes / dist;
    
    const paceMin = Math.floor(paceDecimal);
    const paceSec = Math.round((paceDecimal - paceMin) * 60);

    const resVal = document.getElementById('hc-hmp-res-val');
    resVal.innerText = `${paceMin}:${paceSec < 10 ? '0' + paceSec : paceSec}`;

    document.getElementById('hc-half-pace-result').classList.add('visible');
}
