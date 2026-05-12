function hcSuTuketimiHesapla() {
    const weight = parseFloat(document.getElementById('hc-water-weight').value);
    const activity = parseFloat(document.getElementById('hc-water-activity').value);
    const climate = parseFloat(document.getElementById('hc-water-climate').value);

    if (!weight || weight <= 0) {
        alert('Lütfen kilonuzu giriniz.');
        return;
    }

    // Base requirement: 35ml per kg body weight
    let totalMl = (weight * 35) + activity + climate;
    
    const totalLiters = totalMl / 1000;
    const cups = totalMl / 250; // Standard 250ml glass

    const resultDiv = document.getElementById('hc-water-intake-result');
    document.getElementById('hc-water-val').innerText = totalLiters.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre';
    document.getElementById('hc-water-cups').innerHTML = `Yaklaşık <strong>${Math.ceil(cups)}</strong> standart bardak (250ml).`;
    
    resultDiv.classList.add('visible');
}
