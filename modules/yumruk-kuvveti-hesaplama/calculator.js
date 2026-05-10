function hcYumrukKuvvetiHesapla() {
    const bw = parseFloat(document.getElementById('hc-punch-bw').value);
    const speed = parseFloat(document.getElementById('hc-punch-speed').value);

    if (!bw) {
        alert('Lütfen vücut ağırlığınızı girin.');
        return;
    }

    // Basitleştirilmiş fizik modeli: Darbe Kuvveti (N) = m * v / t
    // Yumrukta etkili kütle vücut ağırlığının yaklaşık %10-15'idir.
    // Durma süresi (t) yaklaşık 0.01s - 0.05s arasıdır.
    const effectiveMass = bw * 0.12; 
    const impactTime = 0.02; // saniye
    const forceN = (effectiveMass * speed) / impactTime;
    const forceKg = forceN / 9.81;

    document.getElementById('hc-punch-val').innerText = forceKg.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kgf';
    
    let desc = "";
    if (forceKg < 100) desc = "Hafif bir vuruş.";
    else if (forceKg < 250) desc = "Ortalama bir sporcu yumruğu.";
    else if (forceKg < 500) desc = "Oldukça güçlü, etkileyici bir yumruk.";
    else desc = "Profesyonel düzeyde, nakavt edici güçte bir yumruk!";

    document.getElementById('hc-punch-desc').innerText = desc;
    document.getElementById('hc-punch-result').classList.add('visible');
}
