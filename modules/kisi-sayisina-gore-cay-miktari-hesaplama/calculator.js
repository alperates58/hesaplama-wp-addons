function hcCayMiktariHesapla() {
    const count = parseInt(document.getElementById('hc-tpp-count').value);
    const rounds = parseInt(document.getElementById('hc-tpp-rounds').value);

    if (!count || count <= 0 || !rounds || rounds <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const totalGlasses = count * rounds;
    const totalMl = totalGlasses * 110; // 110ml per tea glass
    const totalLiters = totalMl / 1000;

    // ~28g dry tea per liter of water in teapot
    const dryTeaGrams = totalLiters * 28;

    const resultDiv = document.getElementById('hc-tea-per-person-result');
    document.getElementById('hc-tpp-res-tea').innerText = Math.round(dryTeaGrams) + ' g (~' + Math.round(dryTeaGrams/5) + ' Kaşık)';
    document.getElementById('hc-tpp-res-water').innerText = totalLiters.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Litre';
    
    resultDiv.classList.add('visible');
}
