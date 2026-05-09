function hcSterilTempHesapla() {
    const f0 = parseFloat(document.getElementById('hc-stt-f0').value) || 1;
    const time = parseFloat(document.getElementById('hc-stt-time').value) || 1;
    const z = parseFloat(document.getElementById('hc-stt-z').value) || 10;

    // T = 121.1 + z * log10(F0 / t)
    const temp = 121.1 + z * Math.log10(f0 / time);

    document.getElementById('hc-res-stt-val').innerText = temp.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' °C';
    document.getElementById('hc-steril-temp-result').classList.add('visible');
}
