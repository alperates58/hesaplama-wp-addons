function hcPracticalMeasuresHesapla() {
    const material = document.getElementById('hc-pm-material').value;
    const unit = document.getElementById('hc-pm-unit').value;
    const count = parseFloat(document.getElementById('hc-pm-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen geçerli bir miktar giriniz.');
        return;
    }

    const data = {
        un: { sb: 125, cb: 75, yk: 10, ck: 3 },
        seker: { sb: 200, cb: 120, yk: 15, ck: 5 },
        pirinc: { sb: 185, cb: 110, yk: 18, ck: 6 },
        yag: { sb: 190, cb: 110, yk: 12, ck: 4 },
        salca: { sb: 230, cb: 140, yk: 25, ck: 8 }
    };

    const grams = data[material][unit] * count;

    document.getElementById('hc-pm-val').innerText = grams.toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-pm-info').innerText = 'Değerler ortalama ölçülerdir, malzemenin sıkılığına göre küçük farklar olabilir.';
    
    document.getElementById('hc-practical-result').classList.add('visible');
}
