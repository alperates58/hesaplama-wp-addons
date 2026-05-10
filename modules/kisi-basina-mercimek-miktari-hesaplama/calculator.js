function hcLentilPPHesapla() {
    const count = parseInt(document.getElementById('hc-lentil-count').value);
    const gramsPerPerson = parseFloat(document.getElementById('hc-lentil-dish').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * gramsPerPerson;
    // 1 su bardağı mercimek ~190-200g
    const cups = totalGrams / 195;

    document.getElementById('hc-lentil-total').innerText = totalGrams.toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-lentil-info').innerText = `Yaklaşık ${cups.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} su bardağı kuru mercimek.`;
    
    document.getElementById('hc-lentil-pp-result').classList.add('visible');
}
