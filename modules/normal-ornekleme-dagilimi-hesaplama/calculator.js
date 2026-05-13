function hcNormalOrneklemeHesapla() {
    const mu = parseFloat(document.getElementById('hc-nod-mu').value);
    const sigma = parseFloat(document.getElementById('hc-nod-sigma').value);
    const n = parseInt(document.getElementById('hc-nod-n').value);
    const resultDiv = document.getElementById('hc-normal-ornekleme-dagilimi-hesaplama-result');

    if (isNaN(mu) || isNaN(sigma) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli değerler giriniz (n > 0 olmalıdır).');
        return;
    }

    const meanX = mu;
    const se = sigma / Math.sqrt(n);

    document.getElementById('hc-nod-res-mean').innerText = meanX.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-nod-res-se').innerText = se.toLocaleString('tr-TR', {maximumFractionDigits: 4});

    let desc = "";
    if (n >= 30) {
        desc = "Örneklem büyüklüğü yeterli (n ≥ 30). Merkezi Limit Teoremi'ne göre örneklem ortalaması yaklaşık olarak normal dağılım gösterir.";
    } else {
        desc = "Örneklem büyüklüğü küçük (n < 30). Popülasyonun orijinal dağılımı normal değilse sonuçlar yanıltıcı olabilir.";
    }
    document.getElementById('hc-nod-res-desc').innerText = desc;

    resultDiv.classList.add('visible');
}
