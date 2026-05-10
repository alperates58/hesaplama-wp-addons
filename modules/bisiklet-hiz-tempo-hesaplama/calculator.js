function hcBisikletHizTempoHesapla() {
    const dist = parseFloat(document.getElementById('hc-sp-dist').value);
    const hr = parseFloat(document.getElementById('hc-sp-hr').value) || 0;
    const min = parseFloat(document.getElementById('hc-sp-min').value) || 0;

    const totalHours = hr + (min / 60);
    if (!dist || totalHours === 0) return;

    const speed = dist / totalHours;
    const paceMinTotal = (totalHours * 60) / dist;
    const paceMin = Math.floor(paceMinTotal);
    const paceSec = Math.round((paceMinTotal - paceMin) * 60);

    document.getElementById('hc-sp-speed-val').innerText = speed.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' km/h';
    document.getElementById('hc-sp-pace-val').innerText = `${paceMin}:${paceSec < 10 ? '0' : ''}${paceSec}`;
    document.getElementById('hc-sp-result').classList.add('visible');
}
