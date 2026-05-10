function hcRicePPHesapla() {
    const count = parseInt(document.getElementById('hc-rice-count').value);
    const perPerson = parseFloat(document.getElementById('hc-rice-dish').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalGrams = count * perPerson;
    // 1 su bardağı pirinç ~180-190g
    const cups = totalGrams / 185;

    document.getElementById('hc-rice-total').innerText = totalGrams.toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-rice-info').innerText = `Yaklaşık ${cups.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} su bardağı kuru pirinç.`;
    
    document.getElementById('hc-rice-pp-result').classList.add('visible');
}
