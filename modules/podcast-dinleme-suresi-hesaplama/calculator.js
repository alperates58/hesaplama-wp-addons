function hcPodcastTimeHesapla() {
    const count = parseInt(document.getElementById('hc-pod-count').value) || 0;
    const avg = parseFloat(document.getElementById('hc-pod-avg').value) || 0;
    const speed = parseFloat(document.getElementById('hc-pod-speed').value) || 1;

    const totalMinsNormal = count * avg;
    const totalMinsSpeed = totalMinsNormal / speed;
    const savedMins = totalMinsNormal - totalMinsSpeed;

    function formatTime(m) {
        const hh = Math.floor(m / 60);
        const mm = Math.round(m % 60);
        return (hh > 0 ? hh + " s " : "") + mm + " dk";
    }

    document.getElementById('hc-res-pod-total').innerText = formatTime(totalMinsSpeed);
    document.getElementById('hc-res-pod-saved').innerText = formatTime(savedMins);
    
    document.getElementById('hc-podcast-time-result').classList.add('visible');
}
