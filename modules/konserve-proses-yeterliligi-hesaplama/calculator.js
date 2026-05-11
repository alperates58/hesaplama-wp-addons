function hcCanningF0Hesapla() {
    const t = parseFloat(document.getElementById('hc-f0-t').value);
    const time = parseFloat(document.getElementById('hc-f0-time').value);
    const z = parseFloat(document.getElementById('hc-f0-z').value);
    const tRef = 121.11;

    if (isNaN(t) || isNaN(time) || isNaN(z) || z <= 0 || time < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // F0 = t * 10^((T - Tref) / z)
    const f0 = time * Math.pow(10, (t - tRef) / z);

    document.getElementById('hc-f0-res-val').innerText = f0.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dakika';
    
    let desc = "";
    if (f0 < 3) desc = "Düşük Sterilizasyon (Asitli gıdalar için uygun olabilir)";
    else if (f0 < 6) desc = "Normal Sterilizasyon";
    else desc = "Yüksek Sterilizasyon (Riskli gıdalar için güvenli)";

    document.getElementById('hc-f0-res-desc').innerText = desc;
    document.getElementById('hc-f0-result').classList.add('visible');
}
