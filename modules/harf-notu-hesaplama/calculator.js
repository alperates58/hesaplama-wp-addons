function hcHarfNotuHesapla() {
    const score = parseFloat(document.getElementById('hc-hn-score').value);

    if (isNaN(score) || score < 0 || score > 100) {
        alert('Lütfen 0-100 arası geçerli bir puan girin.');
        return;
    }

    let grade = "";
    if (score >= 90) grade = "AA (4.00)";
    else if (score >= 85) grade = "BA (3.50)";
    else if (score >= 80) grade = "BB (3.00)";
    else if (score >= 75) grade = "CB (2.50)";
    else if (score >= 70) grade = "CC (2.00)";
    else if (score >= 65) grade = "DC (1.50)";
    else if (score >= 60) grade = "DD (1.00)";
    else if (score >= 50) grade = "FD (0.50)";
    else grade = "FF (0.00)";

    document.getElementById('hc-hn-val').innerText = grade;
    document.getElementById('hc-hn-result').classList.add('visible');
}
