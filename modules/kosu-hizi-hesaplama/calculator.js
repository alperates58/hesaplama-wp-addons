function hcRunSpeedHesapla() {
    const min = parseInt(document.getElementById('hc-rs-min').value || 0);
    const sec = parseInt(document.getElementById('hc-rs-sec').value || 0);

    if (!min && !sec) {
        alert('Lütfen tempoyu giriniz.');
        return;
    }

    const totalMinutesPerKm = min + (sec / 60);
    // Speed (km/h) = 60 / (Minutes per km)
    const speed = 60 / totalMinutesPerKm;

    const resVal = document.getElementById('hc-rs-res-val');
    resVal.innerText = speed.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-run-speed-result').classList.add('visible');
}
