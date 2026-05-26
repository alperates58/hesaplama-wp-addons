function hcHashRateVerimlilikHesapla() {
    var guc = parseFloat(document.getElementById('hc-hrv-guc').value) || 0;
    var hashrate = parseFloat(document.getElementById('hc-hrv-has').value) || 0;
    var birim = document.getElementById('hc-hrv-birim').value;

    if (guc <= 0 || hashrate <= 0) {
        alert('Lütfen geçerli güç tüketimi ve kazım gücü giriniz.');
        return;
    }

    var verimlilik = guc / hashrate;
    var birimEtiketi = '';

    if (birim === 'TH') {
        birimEtiketi = ' W/TH (veya J/TH)';
    } else if (birim === 'GH') {
        birimEtiketi = ' W/GH (veya J/GH)';
    } else {
        birimEtiketi = ' W/MH (veya J/MH)';
    }

    document.getElementById('hc-hrv-res-guc').innerText = guc + ' W';
    document.getElementById('hc-hrv-res-has').innerText = hashrate.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' ' + birim + '/s';
    document.getElementById('hc-hrv-res-verimlilik').innerText = verimlilik.toFixed(3) + birimEtiketi;

    document.getElementById('hc-hrv-result').classList.add('visible');
}