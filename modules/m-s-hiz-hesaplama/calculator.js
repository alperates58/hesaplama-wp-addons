function hcMSHızHesapla() {
    const dist = parseFloat(document.getElementById('hc-ms-dist').value);
    const time = parseFloat(document.getElementById('hc-ms-time').value);

    if (isNaN(dist) || isNaN(time) || dist <= 0 || time <= 0) {
        alert('Lütfen geçerli ve pozitif mesafe ve süre değerleri giriniz.');
        return;
    }

    // Hız m/s
    const speedMs = dist / time;
    
    // Hız km/sa
    const speedKmh = speedMs * 3.6;

    // Mach hızı (Ses hızı havadaki ortalama ~343 m/s)
    const mach = speedMs / 343;

    document.getElementById('hc-ms-val').innerText = speedMs.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m/s';
    document.getElementById('hc-ms-kmh-val').innerText = speedKmh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/sa';
    document.getElementById('hc-ms-mach-val').innerText = 'Mach ' + mach.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-m-s-hiz-result').classList.add('visible');
}
