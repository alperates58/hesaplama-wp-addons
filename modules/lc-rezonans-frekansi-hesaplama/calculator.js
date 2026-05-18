function hcLcRezonansFrekansıHesapla() {
    const lVal = parseFloat(document.getElementById('hc-lc-l').value);
    const lUnitMultiplier = parseFloat(document.getElementById('hc-lc-l-unit').value);
    
    const cVal = parseFloat(document.getElementById('hc-lc-c').value);
    const cUnitMultiplier = parseFloat(document.getElementById('hc-lc-c-unit').value);

    if (isNaN(lVal) || isNaN(cVal) || lVal <= 0 || cVal <= 0) {
        alert('Lütfen geçerli ve pozitif indüktans ve kapasitans değerleri giriniz.');
        return;
    }

    // Gerçek değerleri Henry ve Farad cinsinden hesaplayalım
    // lUnitMultiplier: uH = 1, mH = 1000, H = 1000000. Henry = lVal * lUnitMultiplier * 10^-6
    const L = lVal * lUnitMultiplier * 1e-6;
    const C = cVal * cUnitMultiplier;

    // f = 1 / (2 * pi * sqrt(L * C))
    const LC = L * C;
    const omega = 1 / Math.sqrt(LC); // rad/s
    const freq = omega / (2 * Math.PI); // Hz
    const period = 1 / freq; // s

    // Sonucu formatlama
    let freqStr = '';
    if (freq >= 1e6) {
        freqStr = (freq / 1e6).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' MHz';
    } else if (freq >= 1e3) {
        freqStr = (freq / 1e3).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kHz';
    } else {
        freqStr = freq.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Hz';
    }

    document.getElementById('hc-lc-f-val').innerText = freqStr;
    document.getElementById('hc-lc-w-val').innerText = omega.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' rad/s';
    
    let periodStr = '';
    if (period < 1e-6) {
        periodStr = (period * 1e9).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ns';
    } else if (period < 1e-3) {
        periodStr = (period * 1e6).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' &mu;s';
    } else if (period < 1) {
        periodStr = (period * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ms';
    } else {
        periodStr = period.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' s';
    }
    
    document.getElementById('hc-lc-t-val').innerHTML = periodStr;

    document.getElementById('hc-lc-rezonans-frekansi-result').classList.add('visible');
}
