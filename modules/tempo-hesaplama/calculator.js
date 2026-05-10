function hcTempoHesapla() {
    const distMeters = parseFloat(document.getElementById('hc-run-dist').value);
    const hr = parseFloat(document.getElementById('hc-run-hr').value) || 0;
    const min = parseFloat(document.getElementById('hc-run-min').value) || 0;
    const sec = parseFloat(document.getElementById('hc-run-sec').value) || 0;

    const totalSeconds = (hr * 3600) + (min * 60) + sec;
    if (!distMeters || totalSeconds === 0) return;

    const distKm = distMeters / 1000;
    const speed = (distKm / totalSeconds) * 3600;
    
    const paceSecTotal = totalSeconds / distKm;
    const paceMin = Math.floor(paceSecTotal / 60);
    const paceSec = Math.round(paceSecTotal % 60);

    document.getElementById('hc-run-pace-val').innerText = `${paceMin}:${paceSec < 10 ? '0' : ''}${paceSec} dk/km`;
    document.getElementById('hc-run-speed-val').innerText = speed.toFixed(1) + ' km/h';
    document.getElementById('hc-run-result').classList.add('visible');
}
