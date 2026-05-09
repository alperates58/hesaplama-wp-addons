function hcVLDLHesapla() {
    const tri = parseFloat(document.getElementById('hc-vldl-tri').value);

    if (isNaN(tri)) {
        alert('Lütfen trigliserid değerini girin.');
        return;
    }

    if (tri >= 400) {
        alert('Trigliserid değeri 400 mg/dL üzerinde olduğunda bu hesaplama yöntemi güvenilir değildir.');
        return;
    }

    // Formula: VLDL = Triglycerides / 5
    const vldl = tri / 5;

    document.getElementById('hc-vldl-val').innerText = Math.round(vldl) + " mg/dL";
    document.getElementById('hc-vldl-calc-result').classList.add('visible');
}
