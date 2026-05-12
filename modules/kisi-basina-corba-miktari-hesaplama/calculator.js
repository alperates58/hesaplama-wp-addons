function hcCorbaMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-spp-count').value);
    const mlPerPerson = parseFloat(document.getElementById('hc-spp-type').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalMl = count * mlPerPerson;
    const totalLiters = totalMl / 1000;

    const resultDiv = document.getElementById('hc-soup-per-person-result');
    document.getElementById('hc-spp-res-val').innerText = totalLiters.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre';
    
    resultDiv.classList.add('visible');
}
