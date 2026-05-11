function hcCpCpkHesapla() {
    const usl = parseFloat(document.getElementById('hc-cp-usl').value);
    const lsl = parseFloat(document.getElementById('hc-cp-lsl').value);
    const mean = parseFloat(document.getElementById('hc-cp-mean').value);
    const sigma = parseFloat(document.getElementById('hc-cp-sigma').value);

    if (isNaN(usl) || isNaN(lsl) || isNaN(mean) || isNaN(sigma) || sigma <= 0 || usl <= lsl) {
        alert('Lütfen geçerli değerler girin (Sigma > 0 ve USL > LSL olmalıdır).');
        return;
    }

    // Cp = (USL - LSL) / (6 * sigma)
    const cp = (usl - lsl) / (6 * sigma);

    // Cpk = min((USL - mean) / (3 * sigma), (mean - lsl) / (3 * sigma))
    const cpkUpper = (usl - mean) / (3 * sigma);
    const cpkLower = (mean - lsl) / (3 * sigma);
    const cpk = Math.min(cpkUpper, cpkLower);

    document.getElementById('hc-cp-res-cp').innerText = cp.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-cp-res-cpk').innerText = cpk.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    const status = document.getElementById('hc-cp-status');
    if (cpk >= 1.33) {
        status.innerText = "Yeterli Süreç (Cpk >= 1.33)";
        status.style.color = "#2ecc71";
    } else if (cpk >= 1.0) {
        status.innerText = "Sınırda Süreç (1.0 <= Cpk < 1.33)";
        status.style.color = "#f39c12";
    } else {
        status.innerText = "Yetersiz Süreç (Cpk < 1.0)";
        status.style.color = "#e74c3c";
    }

    document.getElementById('hc-cp-result').classList.add('visible');
}
