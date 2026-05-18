function hcUzunlukBuzulmesiHizTipiDegisti() {
    var type = document.getElementById('hc-uzb-v-type').value;
    var vInput = document.getElementById('hc-uzb-v');
    if (type === 'c') {
        vInput.value = 90;
    } else if (type === 'ms') {
        vInput.value = 269813212;
    } else {
        vInput.value = 971327563;
    }
}

function hcUzunlukBuzulmesiHesapla() {
    var L0 = parseFloat(document.getElementById('hc-uzb-l0').value);
    var vType = document.getElementById('hc-uzb-v-type').value;
    var rawV = parseFloat(document.getElementById('hc-uzb-v').value);
    var c = 299792458; // speed of light in m/s

    if (isNaN(L0) || L0 <= 0) {
        alert('Lütfen geçerli bir öz uzunluk (L₀) girin.');
        return;
    }
    if (isNaN(rawV) || rawV < 0) {
        alert('Lütfen geçerli bir hız girin.');
        return;
    }

    var v = 0; // in m/s
    var ratio = 0; // v / c

    if (vType === 'c') {
        if (rawV >= 100) {
            alert('Hız ışık hızına (%100 c) eşit veya ondan büyük olamaz!');
            return;
        }
        ratio = rawV / 100;
        v = ratio * c;
    } else if (vType === 'ms') {
        if (rawV >= c) {
            alert('Hız ışık hızına (299.792.458 m/s) eşit veya ondan büyük olamaz!');
            return;
        }
        v = rawV;
        ratio = v / c;
    } else {
        var vMs = rawV / 3.6;
        if (vMs >= c) {
            alert('Hız ışık hızına eşit veya ondan büyük olamaz!');
            return;
        }
        v = vMs;
        ratio = v / c;
    }

    // Lorentz factor: gamma = 1 / sqrt(1 - v^2/c^2)
    var gamma = 1 / Math.sqrt(1 - Math.pow(ratio, 2));

    // L = L0 / gamma
    var L = L0 / gamma;
    var dL = L0 - L;

    document.getElementById('hc-uzb-res-l').innerText = L.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m';
    document.getElementById('hc-uzb-res-dl').innerText = dL.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m';
    document.getElementById('hc-uzb-res-gamma').innerText = gamma.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    var desc = 'Durgun haldeyken ' + L0.toLocaleString('tr-TR') + ' metre uzunluğunda olan bir cisim, ışık hızının %' + (ratio * 100).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' hızında hareket ederken (Lorentz Faktörü γ = ' + gamma.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + '), dışarıdaki durgun bir gözlemciye göre tam ' + L.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' metre olarak görünecektir. Bu hızda cismin boyu görelilik etkisiyle ' + dL.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' metre kısalmıştır (büzülmüştür).';
    document.getElementById('hc-uzb-desc').innerText = desc;

    document.getElementById('hc-uzunluk-buzulmesi-hesaplama-result').classList.add('visible');
}
