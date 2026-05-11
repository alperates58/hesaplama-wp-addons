function hcMachHesapla() {
    const v = parseFloat(document.getElementById('hc-mc-v').value);
    const tc = parseFloat(document.getElementById('hc-mc-t').value);

    if (isNaN(v) || isNaN(tc) || v < 0) {
        alert('Lütfen geçerli hız ve sıcaklık değerleri girin.');
        return;
    }

    // Speed of sound in air: a = sqrt(gamma * R * T)
    // gamma = 1.4, R = 287 J/kgK
    // a approx 331.3 * sqrt(1 + Tc/273.15) or 20.05 * sqrt(Tk)
    const tk = tc + 273.15;
    const a = 20.05 * Math.sqrt(tk);

    const mach = v / a;

    document.getElementById('hc-mc-res-val').innerText = mach.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    let desc = "";
    if (mach < 0.8) desc = "Subsonik (Ses Altı)";
    else if (mach < 1.2) desc = "Transonik";
    else if (mach < 5) desc = "Süpersonik (Ses Üstü)";
    else desc = "Hipersonik";

    document.getElementById('hc-mc-res-desc').innerText = desc + " (Ses Hızı: " + Math.round(a) + " m/s)";
    document.getElementById('hc-mc-result').classList.add('visible');
}
