function hcLineCapacityHesapla() {
    const timesRaw = document.getElementById('hc-lc-times').value;
    const times = timesRaw.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));
    const workHours = parseFloat(document.getElementById('hc-lc-work').value) || 0;

    if (times.length === 0 || workHours <= 0) return;

    const bottleneck = Math.max(...times);
    const capacity = (workHours * 60) / bottleneck;

    document.getElementById('hc-res-lc-bottleneck').innerText = bottleneck + ' dk';
    document.getElementById('hc-res-lc-val').innerText = Math.floor(capacity).toLocaleString('tr-TR') + ' Adet';
    
    document.getElementById('hc-line-capacity-result').classList.add('visible');
}
