function hcRPMHesapla() {
    const hiz = parseFloat(document.getElementById('hc-rpm-hiz').value);
    const w = parseFloat(document.getElementById('hc-rpm-w').value);
    const r = parseFloat(document.getElementById('hc-rpm-r').value);
    const rim = parseFloat(document.getElementById('hc-rpm-rim').value);
    const gear = parseFloat(document.getElementById('hc-gear-ratio').value);
    const final = parseFloat(document.getElementById('hc-final-drive').value);

    if ([hiz, w, r, rim, gear, final].some(v => isNaN(v) || v <= 0)) {
        alert('Lütfen tüm değerleri geçerli sayılar olarak giriniz.');
        return;
    }

    // 1. Lastik Çevresi (Metre)
    const cap_mm = (rim * 25.4) + (w * (r / 100) * 2);
    const cevre_m = (cap_mm * Math.PI) / 1000;

    // 2. Tekerlek RPM
    // Hız (km/h) -> m/dk: (hiz * 1000) / 60
    const m_dk = (hiz * 1000) / 60;
    const wheel_rpm = m_dk / cevre_m;

    // 3. Motor RPM
    const engine_rpm = wheel_rpm * gear * final;

    // Sonuç
    document.getElementById('hc-res-rpm').innerText = Math.round(engine_rpm).toLocaleString('tr-TR');

    document.getElementById('hc-rpm-result').classList.add('visible');
    document.getElementById('hc-rpm-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
