function hcOrneklemOraniHesapla() {
    const x = parseFloat(document.getElementById('hc-prop-x').value);
    const n = parseFloat(document.getElementById('hc-prop-n').value);
    const resultDiv = document.getElementById('hc-orneklem-orani-hesaplama-result');

    if (isNaN(x) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli sayılar giriniz (n > 0 olmalıdır).');
        return;
    }

    if (x > n) {
        alert('Olay sayısı (X), toplam örneklem sayısından (n) büyük olamaz.');
        return;
    }

    const p = x / n;
    
    document.getElementById('hc-prop-res-value').innerText = p.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-prop-res-percent').innerText = `Yüzde: %${(p * 100).toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;

    resultDiv.classList.add('visible');
}
