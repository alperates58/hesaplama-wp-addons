function hcNRSHesapla() {
    const nutScore = parseInt(document.getElementById('hc-nrs-nutritional').value);
    const disScore = parseInt(document.getElementById('hc-nrs-disease').value);
    const ageScore = parseInt(document.getElementById('hc-nrs-age').value);

    const totalScore = nutScore + disScore + ageScore;

    document.getElementById('hc-nrs-score').innerText = totalScore;

    const interp = document.getElementById('hc-nrs-interpretation');
    if (totalScore >= 3) {
        interp.innerText = 'RİSK VAR: Beslenme müdahalesi önerilir.';
        interp.style.backgroundColor = '#ffebee';
        interp.style.color = '#c62828';
    } else {
        interp.innerText = 'RİSK DÜŞÜK: Haftalık rutin takip önerilir.';
        interp.style.backgroundColor = '#e8f5e9';
        interp.style.color = '#2e7d32';
    }

    document.getElementById('hc-beslenme-risk-result').classList.add('visible');
}
