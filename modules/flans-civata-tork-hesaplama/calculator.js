function hcBoltTorqueHesapla() {
    const size = parseFloat(document.getElementById('hc-bt-size').value);
    const grade = parseFloat(document.getElementById('hc-bt-grade').value);
    const k = parseFloat(document.getElementById('hc-bt-k').value);

    // Yield strengths for grades (N/mm2)
    const yields = {
        "8.8": 640,
        "10.9": 940,
        "12.9": 1080
    };

    // Approximate stress area (mm2) for Metric bolts
    const areas = {
        "8": 36.6,
        "10": 58,
        "12": 84.3,
        "14": 115,
        "16": 157,
        "20": 245,
        "24": 353,
        "30": 561
    };

    const yield = yields[grade.toFixed(1)];
    const area = areas[size.toString()];

    // Force F = 75% of Yield * Area
    const forceN = yield * 0.75 * area;

    // Torque T = K * F * d (d in meters)
    const torqueNm = k * forceN * (size / 1000);

    document.getElementById('hc-bt-res-val').innerText = Math.round(torqueNm).toLocaleString('tr-TR') + ' Nm';
    
    document.getElementById('hc-bt-result').classList.add('visible');
}
