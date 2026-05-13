function hcDpmoHesapla() {
    const defects = parseFloat(document.getElementById('hc-dpmo-defects').value);
    const units = parseFloat(document.getElementById('hc-dpmo-units').value);
    const opps = parseFloat(document.getElementById('hc-dpmo-opps').value);
    const resultDiv = document.getElementById('hc-milyon-firsatta-hata-dpmo-hesaplama-result');

    if (isNaN(defects) || isNaN(units) || isNaN(opps) || units <= 0 || opps <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const totalOpportunities = units * opps;
    const dpmo = (defects / totalOpportunities) * 1000000;

    document.getElementById('hc-dpmo-res-val').innerText = Math.round(dpmo).toLocaleString('tr-TR');

    // Basic Sigma Level approximation (including 1.5 sigma shift)
    let sigma = "N/A";
    if (dpmo <= 3.4) sigma = "6 Sigma";
    else if (dpmo <= 233) sigma = "5 Sigma";
    else if (dpmo <= 6210) sigma = "4 Sigma";
    else if (dpmo <= 66807) sigma = "3 Sigma";
    else if (dpmo <= 308537) sigma = "2 Sigma";
    else sigma = "1 Sigma";

    document.getElementById('hc-dpmo-res-sigma').innerText = `Tahmini Seviye: ${sigma}`;

    resultDiv.classList.add('visible');
}
