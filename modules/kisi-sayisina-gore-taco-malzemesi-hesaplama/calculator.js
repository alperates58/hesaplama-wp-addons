function hcTacoHesapla() {
    const count = parseInt(document.getElementById('hc-taco-count').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Per person basis
    const shells = 3;
    const meat = 150; // g
    const cheese = 50; // g
    const salsa = 60; // g

    const resultDiv = document.getElementById('hc-taco-per-person-result');
    document.getElementById('hc-taco-res-shells').innerText = (count * shells) + ' Adet';
    document.getElementById('hc-taco-res-meat').innerText = (count * meat).toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-taco-res-cheese').innerText = (count * cheese).toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-taco-res-other').innerText = (count * salsa).toLocaleString('tr-TR') + ' g';
    
    resultDiv.classList.add('visible');
}
