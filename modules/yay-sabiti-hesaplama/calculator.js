function hcYaySabitiSolveDegisti() {
    var mode = document.getElementById('hc-ysh-solve').value;
    
    document.getElementById('hc-ysh-k-group').style.display = mode === 'k' ? 'none' : 'block';
    document.getElementById('hc-ysh-f-group').style.display = mode === 'f' ? 'none' : 'block';
    document.getElementById('hc-ysh-x-group').style.display = mode === 'x' ? 'none' : 'block';
}

function hcYaySabitiHesapla() {
    var mode = document.getElementById('hc-ysh-solve').value;
    var xUnit = document.getElementById('hc-ysh-x-unit').value;

    var k = parseFloat(document.getElementById('hc-ysh-k').value);
    var F = parseFloat(document.getElementById('hc-ysh-f').value);
    var xVal = parseFloat(document.getElementById('hc-ysh-x-val').value);

    // Convert x to meters for calculation
    var x = 0;
    if (xUnit === 'm') x = xVal;
    else if (xUnit === 'cm') x = xVal / 100;
    else if (xUnit === 'mm') x = xVal / 1000;

    var resVal = 0;
    var resLabel = '';
    var desc = '';

    if (mode === 'k') {
        if (isNaN(F) || F < 0 || isNaN(xVal) || xVal <= 0) {
            alert('Lütfen geçerli kuvvet ve pozitif uzama/sıkışma değeri girin.');
            return;
        }

        // k = F / x
        k = F / x;
        resVal = k;
        resLabel = 'Yay Sabiti (k):';
        desc = F.toLocaleString('tr-TR') + ' Newton kuvvet uygulandığında ' + xVal.toLocaleString('tr-TR') + ' ' + xUnit + ' uzayan/sıkışan yayın yay sabiti (sertlik derecesi) tam ' + k.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N/m (Newton/metre) olarak hesaplanmıştır.';
    } else if (mode === 'f') {
        if (isNaN(k) || k <= 0 || isNaN(xVal) || xVal < 0) {
            alert('Lütfen geçerli yay sabiti ve uzama/sıkışma değeri girin.');
            return;
        }

        // F = k * x
        F = k * x;
        resVal = F;
        resLabel = 'Uygulanan Kuvvet (F):';
        desc = k.toLocaleString('tr-TR') + ' N/m yay sabitine sahip bir yayın ' + xVal.toLocaleString('tr-TR') + ' ' + xUnit + ' uzatılması veya sıkıştırılması için yaya uygulanması gereken mekanik kuvvet ' + F.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Newton (N)\'dur.';
    } else {
        if (isNaN(k) || k <= 0 || isNaN(F) || F < 0) {
            alert('Lütfen geçerli yay sabiti ve kuvvet değerleri girin.');
            return;
        }

        // x = F / k
        x = F / k;
        var displayX = x;
        if (xUnit === 'cm') displayX = x * 100;
        else if (xUnit === 'mm') displayX = x * 1000;

        resVal = displayX;
        resLabel = 'Uzama / Sıkışma Miktarı (x):';
        desc = k.toLocaleString('tr-TR') + ' N/m yay sabitine sahip bir yaya ' + F.toLocaleString('tr-TR') + ' Newton kuvvet uygulandığında yayda meydana gelecek şekil değiştirme (uzama/sıkışma) miktarı ' + displayX.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' ' + xUnit + ' olarak hesaplanmıştır.';
    }

    var unitSuffix = mode === 'k' ? ' N/m' : (mode === 'f' ? ' N' : ' ' + xUnit);
    document.getElementById('hc-ysh-res-label').innerText = resLabel;
    document.getElementById('hc-ysh-res-val').innerText = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + unitSuffix;
    document.getElementById('hc-ysh-desc').innerText = desc;

    document.getElementById('hc-yay-sabiti-hesaplama-result').classList.add('visible');
}
