function hcDonguHesapla() {
    const nominalCycles = parseFloat(document.getElementById('hc-cl-total').value);
    const dod = parseFloat(document.getElementById('hc-cl-dod').value);
    const freq = parseFloat(document.getElementById('hc-cl-freq').value);

    if (isNaN(nominalCycles) || isNaN(dod) || isNaN(freq)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Simplified Cycle Life vs DoD model (Logarithmic-like)
    // Reference: Cycle Life at 80% is nominal. 
    // If DoD is 20%, cycles increase significantly (e.g., 4-5x).
    // If DoD is 100%, cycles decrease slightly.
    const multiplier = Math.pow((80 / dod), 1.5);
    const adjustedCycles = nominalCycles * multiplier;
    
    const totalDays = adjustedCycles / freq;
    const totalYears = totalDays / 365;

    document.getElementById('hc-res-cl-years').innerText = totalYears.toFixed(1) + ' Yıl';
    document.getElementById('hc-res-cl-total').innerText = Math.round(adjustedCycles).toLocaleString('tr-TR') + ' Döngü';

    document.getElementById('hc-cl-result').classList.add('visible');
}
