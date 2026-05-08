function hcMtvHesapla() {
    const type = document.getElementById('hc-mtv-type').value;
    const engine = parseInt(document.getElementById('hc-mtv-engine').value);
    const age = parseInt(document.getElementById('hc-mtv-age').value);

    let annualMtv = 0;

    if (type === 'car') {
        // Simple matrix for Otomobil (2026 approx rates)
        if (engine <= 1300) {
            if (age <= 3) annualMtv = 4500;
            else if (age <= 6) annualMtv = 3100;
            else if (age <= 11) annualMtv = 1800;
            else annualMtv = 800;
        } else if (engine <= 1600) {
            if (age <= 3) annualMtv = 7500;
            else if (age <= 6) annualMtv = 5600;
            else if (age <= 11) annualMtv = 3300;
            else annualMtv = 1400;
        } else if (engine <= 2000) {
            if (age <= 3) annualMtv = 21000;
            else if (age <= 6) annualMtv = 16000;
            else if (age <= 11) annualMtv = 9500;
            else annualMtv = 3800;
        } else {
            if (age <= 3) annualMtv = 45000;
            else if (age <= 6) annualMtv = 35000;
            else annualMtv = 20000;
        }
    } else {
        // Motosiklet
        if (engine <= 250) annualMtv = 600;
        else if (engine <= 650) annualMtv = 1500;
        else annualMtv = 3500;
        
        if (age > 6) annualMtv *= 0.6;
    }

    document.getElementById('hc-mtv-val').innerText = annualMtv.toLocaleString('tr-TR') + " ₺";
    document.getElementById('hc-mtv-result').classList.add('visible');
}
