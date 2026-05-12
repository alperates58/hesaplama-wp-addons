function hcPureeHesapla() {
    const count = parseInt(document.getElementById('hc-ppm-count').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Per person
    const potato = 225; // g
    const butter = 20; // g
    const milk = 50; // ml

    const totalPotato = count * potato;

    const resultDiv = document.getElementById('hc-potato-puree-result');
    
    if (totalPotato >= 1000) {
        document.getElementById('hc-ppm-res-potato').innerText = (totalPotato / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    } else {
        document.getElementById('hc-ppm-res-potato').innerText = totalPotato.toLocaleString('tr-TR') + ' g';
    }
    
    document.getElementById('hc-ppm-res-butter').innerText = (count * butter).toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-ppm-res-milk').innerText = (count * milk).toLocaleString('tr-TR') + ' ml';
    
    resultDiv.classList.add('visible');
}
