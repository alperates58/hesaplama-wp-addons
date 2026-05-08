function hcLDLHesapla() {
    const total = parseFloat(document.getElementById('hc-ldl-total').value);
    const hdl = parseFloat(document.getElementById('hc-ldl-hdl').value);
    const tri = parseFloat(document.getElementById('hc-ldl-tri').value);

    if (isNaN(total) || isNaN(hdl) || isNaN(tri)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    if (tri >= 400) {
        alert('Trigliserid değeri 400 mg/dL üzerinde olduğunda Friedewald formülü kullanılamaz. Lütfen laboratuvar sonucuna bakın.');
        return;
    }

    // Friedewald Formula: LDL = Total - HDL - (Triglycerides / 5)
    const ldl = total - hdl - (tri / 5);

    document.getElementById('hc-ldl-val').innerText = Math.round(ldl) + " mg/dL";

    const status = document.getElementById('hc-ldl-status');
    if (ldl < 100) {
        status.innerText = "Optimal";
        status.style.backgroundColor = "#e8f5e9"; status.style.color = "#2e7d32";
    } else if (ldl < 130) {
        status.innerText = "Normalin Üstü / Sınırda";
        status.style.backgroundColor = "#fffde7"; status.style.color = "#fbc02d";
    } else if (ldl < 160) {
        status.innerText = "Yüksek";
        status.style.backgroundColor = "#fff3e0"; status.style.color = "#ef6c00";
    } else {
        status.innerText = "Çok Yüksek";
        status.style.backgroundColor = "#ffebee"; status.style.color = "#c62828";
    }

    document.getElementById('hc-ldl-calc-result').classList.add('visible');
}
