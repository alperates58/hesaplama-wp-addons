function hcTkyHesapla() {
    const balance = parseFloat(document.getElementById('hc-tky-current-balance').value);
    const currMonthly = parseFloat(document.getElementById('hc-tky-current-monthly').value);
    const currTerm = parseInt(document.getElementById('hc-tky-current-term').value);
    const newRate = parseFloat(document.getElementById('hc-tky-new-rate').value);
    const fees = parseFloat(document.getElementById('hc-tky-fees').value) || 0;

    if (isNaN(balance) || isNaN(currMonthly) || isNaN(newRate)) {
        alert('Lütfen gerekli alanları doldurun.');
        return;
    }

    const currentTotalRemaining = currMonthly * currTerm;
    const newPrincipal = balance + fees;
    const effectiveNewRate = (newRate / 100) * 1.20; // KKDF + BSMV

    let newMonthly;
    if (effectiveNewRate === 0) {
        newMonthly = newPrincipal / currTerm;
    } else {
        newMonthly = newPrincipal * (effectiveNewRate * Math.pow(1 + effectiveNewRate, currTerm)) / (Math.pow(1 + effectiveNewRate, currTerm) - 1);
    }

    const newTotalRemaining = newMonthly * currTerm;
    const totalSaving = currentTotalRemaining - newTotalRemaining;

    document.getElementById('hc-tky-new-monthly').innerText = newMonthly.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";
    document.getElementById('hc-tky-total-saving').innerText = totalSaving.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + " ₺";

    const summary = document.getElementById('hc-tky-summary');
    if (totalSaving > 0) {
        summary.innerText = "Yenileme avantajlı görünüyor!";
        summary.style.color = "green";
    } else {
        summary.innerText = "Yenileme şu an için avantajlı değil.";
        summary.style.color = "red";
    }

    document.getElementById('hc-tky-result').classList.add('visible');
}
