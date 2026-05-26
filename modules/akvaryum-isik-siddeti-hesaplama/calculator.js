function hcIsikHesapla() {
    var hacim = parseFloat(document.getElementById('hc-ais-hacim').value) || 0;
    var bitki = document.getElementById('hc-ais-bitki').value;

    if (hacim <= 0) {
        alert('Lütfen akvaryum hacmini giriniz.');
        return;
    }

    var ledLumenPerLt = 15;
    var floWattPerLt = 0.3;

    if (bitki === 'dusuk') {
        ledLumenPerLt = 15;
        floWattPerLt = 0.3;
    } else if (bitki === 'orta') {
        ledLumenPerLt = 25;
        floWattPerLt = 0.55;
    } else if (bitki === 'yuksek') {
        ledLumenPerLt = 40;
        floWattPerLt = 0.85;
    }

    var toplamLumen = hacim * ledLumenPerLt;
    var toplamWatt = hacim * floWattPerLt;

    document.getElementById('hc-ais-res-led').innerText = Math.round(toplamLumen) + ' Lümen';
    document.getElementById('hc-ais-res-floresan').innerText = toplamWatt.toFixed(1) + ' Watt';
    document.getElementById('hc-ais-res-led-lt').innerText = ledLumenPerLt + ' lm/L';

    document.getElementById('hc-ais-result').classList.add('visible');
}