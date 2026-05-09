function hcZTestHesapla() {
    const x = parseFloat(document.getElementById('hc-zt-mean').value) || 0;
    const mu = parseFloat(document.getElementById('hc-zt-pop-mean').value) || 0;
    const sigma = parseFloat(document.getElementById('hc-zt-std').value) || 0;
    const n = parseFloat(document.getElementById('hc-zt-n').value) || 0;

    if (sigma <= 0 || n <= 0) return;

    // Z = (x - mu) / (sigma / sqrt(n))
    const z = (x - mu) / (sigma / Math.sqrt(n));

    // P-value approximation for normal distribution (Two-tailed)
    function GetZPercent(z) {
        if (z < -6.5) return 0.0;
        if (z > 6.5) return 1.0;
        var factK = 1;
        var sum = 0;
        var term = 1;
        var k = 0;
        var loopStop = Math.exp(-0.5 * z * z) * 0.3989422804;
        while (Math.abs(term) > 0.00000001) {
            term = 0.3989422804 * Math.exp(-0.5 * z * z) * Math.pow(z, 2 * k + 1) / (2 * k + 1);
            for (var i = 1; i <= k; i++) term /= (2 * i);
            sum += term;
            k++;
        }
        return 0.5 + sum;
    }

    const pVal = 2 * (1 - GetZPercent(Math.abs(z)));

    document.getElementById('hc-res-zt-val').innerText = z.toFixed(4);
    document.getElementById('hc-res-zt-p').innerText = pVal.toFixed(6);

    const sigNode = document.getElementById('hc-zt-sig');
    if (pVal < 0.05) {
        sigNode.innerText = "Sonuç istatistiksel olarak anlamlıdır (p < 0.05).";
        sigNode.style.color = "#27ae60";
    } else {
        sigNode.innerText = "Sonuç istatistiksel olarak anlamlı değildir (p >= 0.05).";
        sigNode.style.color = "#c0392b";
    }

    document.getElementById('hc-z-test-result').classList.add('visible');
}
