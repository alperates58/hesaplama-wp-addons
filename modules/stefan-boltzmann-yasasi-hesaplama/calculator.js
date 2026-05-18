function hcStefanBoltzmannHesapla() {
    var A = parseFloat(document.getElementById('hc-sby-area').value);
    var tType = document.getElementById('hc-sby-temp-type').value;
    var rawT = parseFloat(document.getElementById('hc-sby-temp').value);
    var e = parseFloat(document.getElementById('hc-sby-e').value);

    if (isNaN(A) || A <= 0) {
        alert('Lütfen geçerli bir yüzey alanı girin.');
        return;
    }
    if (isNaN(rawT)) {
        alert('Lütfen geçerli bir sıcaklık değeri girin.');
        return;
    }
    if (isNaN(e) || e < 0 || e > 1) {
        alert('Yayma katsayısı (emisivite) 0 ile 1.0 arasında olmalıdır.');
        return;
    }

    var T = rawT;
    if (tType === 'c') {
        T = rawT + 273.15;
    }

    if (T <= 0) {
        alert('Sıcaklık mutlak sıfırdan (0 K) yüksek olmalıdır.');
        return;
    }

    // sigma = 5.670374419e-8
    var sigma = 5.670374419e-8;

    // P = e * sigma * A * T^4
    var P = e * sigma * A * Math.pow(T, 4);
    var Pa = P / A; // Power per unit area

    document.getElementById('hc-sby-res-w').innerText = P.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Watt';
    document.getElementById('hc-sby-res-wa').innerText = Pa.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' W/m²';

    var desc = A.toLocaleString('tr-TR') + ' m² yüzey alanına ve ' + e.toLocaleString('tr-TR') + ' yayma katsayısına sahip bir cisim, ' + T.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' K sıcaklıkta uzaya saniyede toplam ' + P.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Joule (yani ' + P.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Watt) elektromanyetik termal ışıma gücü salar.';
    document.getElementById('hc-sby-desc').innerText = desc;

    document.getElementById('hc-stefan-boltzmann-yasasi-hesaplama-result').classList.add('visible');
}
