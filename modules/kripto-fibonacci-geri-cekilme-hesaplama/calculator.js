function hcKriptoFibonacciHesapla() {
    var high = parseFloat(document.getElementById('hc-kfg-high').value) || 0;
    var low = parseFloat(document.getElementById('hc-kfg-low').value) || 0;
    var trend = document.getElementById('hc-kfg-trend').value;

    if (high <= 0 || low <= 0) {
        alert('Lütfen geçerli tepe ve dip fiyatları giriniz.');
        return;
    }

    if (low >= high) {
        alert('Dip fiyatı tepe fiyatından küçük olmalıdır.');
        return;
    }

    var diff = high - low;
    var levels = {};

    if (trend === 'up') {
        levels['0'] = high;
        levels['236'] = high - (diff * 0.236);
        levels['382'] = high - (diff * 0.382);
        levels['500'] = high - (diff * 0.5);
        levels['618'] = high - (diff * 0.618);
        levels['786'] = high - (diff * 0.786);
        levels['100'] = low;
    } else {
        levels['0'] = low;
        levels['236'] = low + (diff * 0.236);
        levels['382'] = low + (diff * 0.382);
        levels['500'] = low + (diff * 0.5);
        levels['618'] = low + (diff * 0.618);
        levels['786'] = low + (diff * 0.786);
        levels['100'] = high;
    }

    document.getElementById('hc-kfg-res-0').innerText = levels['0'].toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-kfg-res-236').innerText = levels['236'].toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-kfg-res-382').innerText = levels['382'].toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-kfg-res-500').innerText = levels['500'].toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-kfg-res-618').innerText = levels['618'].toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-kfg-res-786').innerText = levels['786'].toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-kfg-res-100').innerText = levels['100'].toLocaleString('tr-TR', {maximumFractionDigits: 4});

    document.getElementById('hc-kfg-result').classList.add('visible');
}