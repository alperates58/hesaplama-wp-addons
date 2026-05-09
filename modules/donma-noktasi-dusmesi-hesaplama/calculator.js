function hcDNDHesapla() {
    const i = parseFloat(document.getElementById('hc-dn-i').value);
    const kf = parseFloat(document.getElementById('hc-dn-kf').value);
    const m = parseFloat(document.getElementById('hc-dn-m').value);

    if (isNaN(i) || isNaN(kf) || isNaN(m)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // ΔTf = i * Kf * m
    const dtf = i * kf * m;

    document.getElementById('hc-dn-val').innerText = dtf.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' °C';
    document.getElementById('hc-dn-result').classList.add('visible');
}
