function hcTntEsdegeriHesapla() {
    var val = parseFloat(document.getElementById('hc-tnt-energy-val').value);
    var unit = document.getElementById('hc-tnt-energy-unit').value;

    if (isNaN(val) || val <= 0) {
        alert('Lütfen pozitif bir enerji değeri girin.');
        return;
    }

    // Convert everything to Joules
    var joules = val;
    if (unit === 'kj') joules = val * 1e3;
    else if (unit === 'mj') joules = val * 1e6;
    else if (unit === 'gj') joules = val * 1e9;
    else if (unit === 'kwh') joules = val * 3.6e6;
    else if (unit === 'kcal') joules = val * 4184;

    // 1 gram of TNT = 4184 Joules
    var tntGram = joules / 4184;
    var tntKg = tntGram / 1000;
    var tntTon = tntKg / 1000;

    document.getElementById('hc-tnt-res-g').innerText = tntGram.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g TNT';
    document.getElementById('hc-tnt-res-kg').innerText = tntKg.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' kg TNT';
    document.getElementById('hc-tnt-res-ton').innerText = tntTon.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' ton TNT';

    var desc = val.toLocaleString('tr-TR') + ' ' + unit.toUpperCase() + ' enerji miktarı, ' + joules.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' Joule değerine eşittir. Bu muazzam enerji, tam olarak ' + tntKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg TNT patlayıcısının patladığında açığa çıkardığı termal enerjiye eşittir.';
    document.getElementById('hc-tnt-desc').innerText = desc;

    document.getElementById('hc-tnt-esdegeri-enerji-hesaplama-result').classList.add('visible');
}
