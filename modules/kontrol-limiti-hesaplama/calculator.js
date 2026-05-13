function hcKontrolLimitiHesapla() {
    const input = document.getElementById('hc-ctrl-data').value;
    const z = parseFloat(document.getElementById('hc-ctrl-sigma').value);
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));

    if (data.length < 2) {
        alert('Hesaplama için en az 2 veri noktası girmelisiniz.');
        return;
    }

    if (isNaN(z) || z <= 0) {
        alert('Lütfen geçerli bir kontrol seviyesi girin.');
        return;
    }

    const n = data.length;
    const mean = data.reduce((a, b) => a + b, 0) / n;
    
    const variance = data.reduce((acc, val) => acc + Math.pow(val - mean, 2), 0) / (n - 1);
    const stdDev = Math.sqrt(variance);

    const ucl = mean + z * stdDev;
    const lcl = Math.max(0, mean - z * stdDev); // LCL usually can't be negative in many processes

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-ctrl-mean').innerText = fmt(mean);
    document.getElementById('hc-res-ctrl-std').innerText = fmt(stdDev);
    document.getElementById('hc-res-ctrl-ucl').innerText = fmt(ucl);
    document.getElementById('hc-res-ctrl-lcl').innerText = fmt(lcl);

    document.getElementById('hc-kontrol-limiti-result').classList.add('visible');
}
