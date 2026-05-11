function hcAntenUzunluguHesapla() {
    const fVal = parseFloat(document.getElementById('hc-ant-frekans').value);
    const birim = parseFloat(document.getElementById('hc-ant-birim').value);

    if (!fVal) {
        alert('Lütfen frekans değerini giriniz.');
        return;
    }

    const fMHz = fVal * birim;

    // Yarim dalga boyu (metre) = 142.5 / f(MHz) -> K faktörü dahil yaklasik
    const half = 142.5 / fMHz;
    const quarter = half / 2;

    const sonucDiv = document.getElementById('hc-antenna-result');
    
    document.getElementById('hc-ant-res-half').innerText = half.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' m';
    document.getElementById('hc-ant-res-quarter').innerText = quarter.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' m';
    
    const noteDiv = document.getElementById('hc-ant-res-note');
    noteDiv.innerText = `Işık hızı ve yaklaşık 0.95 hız faktörü (k-factor) baz alınmıştır.`;

    sonucDiv.classList.add('visible');
}
