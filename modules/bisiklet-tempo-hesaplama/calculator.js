function hcBisikletTempoHesapla() {
    const speed = parseFloat(document.getElementById('hc-bike-pace-speed').value);

    if (!speed) {
        alert('Lütfen hızı girin.');
        return;
    }

    // Pace (min/km) = 60 / Speed (km/h)
    const totalMinutes = 60 / speed;
    const minutes = Math.floor(totalMinutes);
    const seconds = Math.round((totalMinutes - minutes) * 60);

    document.getElementById('hc-bike-pace-val').innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds} dk/km`;
    
    document.getElementById('hc-bike-pace-result').classList.add('visible');
}
