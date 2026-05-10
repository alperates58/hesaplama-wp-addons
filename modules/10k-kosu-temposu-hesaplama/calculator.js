function hc10kPaceHesapla() {
    const min = parseInt(document.getElementById('hc-10k-min').value || 0);
    const sec = parseInt(document.getElementById('hc-10k-sec').value || 0);
    const dist = 10.0;

    if (!min && !sec) {
        alert('Lütfen hedef sürenizi giriniz.');
        return;
    }

    const totalMinutes = min + (sec / 60);
    const paceDecimal = totalMinutes / dist;
    
    const paceMin = Math.floor(paceDecimal);
    const paceSec = Math.round((paceDecimal - paceMin) * 60);

    const resVal = document.getElementById('hc-10k-res-val');
    resVal.innerText = `${paceMin}:${paceSec < 10 ? '0' + paceSec : paceSec}`;

    document.getElementById('hc-10k-pace-result').classList.add('visible');
}
