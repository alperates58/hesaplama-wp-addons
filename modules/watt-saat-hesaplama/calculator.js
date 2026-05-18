function hcWattSaatHesapla() {
    var W = parseFloat(document.getElementById('hc-wsh-power').value);
    var hrs = parseFloat(document.getElementById('hc-wsh-hours').value);
    var mins = parseFloat(document.getElementById('hc-wsh-mins').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli bir Watt değeri girin.');
        return;
    }
    if (isNaN(hrs) || hrs < 0) hrs = 0;
    if (isNaN(mins) || mins < 0) mins = 0;

    if (hrs === 0 && mins === 0) {
        alert('Lütfen çalışma süresini saat veya dakika olarak belirtin.');
        return;
    }

    // Total time in hours
    var t = hrs + (mins / 60);

    // Wh = W * t
    var wh = W * t;
    var kwh = wh / 1000;

    // Joule = Wh * 3600
    var j = wh * 3600;

    document.getElementById('hc-wsh-res-wh').innerText = wh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Wh';
    document.getElementById('hc-wsh-res-kwh').innerText = kwh.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' kWh';
    document.getElementById('hc-wsh-res-j').innerText = j.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' J';

    var desc = W.toLocaleString('tr-TR') + ' Watt gücündeki bir cihazın ' + hrs.toLocaleString('tr-TR') + ' saat ' + mins.toLocaleString('tr-TR') + ' dakika boyunca kesintisiz çalışması durumunda tüketeceği toplam enerji ' + wh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Wh (' + kwh.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kWh) olarak hesaplanmıştır. Bu miktar ' + j.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' Joule termodinamik enerjiye karşılık gelir.';
    document.getElementById('hc-wsh-desc').innerText = desc;

    document.getElementById('hc-watt-saat-hesaplama-result').classList.add('visible');
}
