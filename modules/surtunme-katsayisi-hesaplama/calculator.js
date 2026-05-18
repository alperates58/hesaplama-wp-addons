function hcSurtunmeKatsayisiModDegisti() {
    var mode = document.getElementById('hc-sk-mode').value;
    if (mode === 'forces') {
        document.getElementById('hc-sk-forces-group').style.display = 'block';
        document.getElementById('hc-sk-angle-group').style.display = 'none';
    } else {
        document.getElementById('hc-sk-forces-group').style.display = 'none';
        document.getElementById('hc-sk-angle-group').style.display = 'block';
    }
}

function hcSurtunmeKatsayisiHesapla() {
    var mode = document.getElementById('hc-sk-mode').value;
    var mu = 0;
    var desc = '';

    if (mode === 'forces') {
        var ff = parseFloat(document.getElementById('hc-sk-ff').value);
        var fn = parseFloat(document.getElementById('hc-sk-fn').value);

        if (isNaN(ff) || ff < 0) {
            alert('Lütfen geçerli bir sürtünme kuvveti değeri girin.');
            return;
        }
        if (isNaN(fn) || fn <= 0) {
            alert('Lütfen geçerli ve pozitif bir normal kuvvet girin.');
            return;
        }
        if (ff > fn) {
            // Generally true but mathematically not impossible (e.g. silicone or adhesives can have mu > 1)
        }

        // mu = Ff / Fn
        mu = ff / fn;
        desc = ff.toLocaleString('tr-TR') + ' N büyüklüğündeki sürtünme kuvveti ve ' + fn.toLocaleString('tr-TR') + ' N büyüklüğündeki dik normal kuvvet oranına göre sürtünme katsayısı μ = ' + mu.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' olarak hesaplanır.';
    } else {
        var theta = parseFloat(document.getElementById('hc-sk-theta').value);

        if (isNaN(theta) || theta < 0 || theta >= 90) {
            alert('Lütfen 0 ile 90 derece arasında geçerli bir eğim açısı girin.');
            return;
        }

        // mu = tan(theta)
        var rad = (theta * Math.PI) / 180;
        mu = Math.tan(rad);
        desc = 'Bir cismin eğimli bir yüzeyde kaymaya başladığı kritik eğim açısı (doğal kayma açısı) ' + theta.toLocaleString('tr-TR') + '° ise, yüzeyler arasındaki statik sürtünme katsayısı açının tanjantına eşittir: μ = tan(' + theta.toLocaleString('tr-TR') + '°) = ' + mu.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' olarak hesaplanır.';
    }

    document.getElementById('hc-sk-res-mu').innerText = mu.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-sk-desc').innerText = desc;

    document.getElementById('hc-surtunme-katsayisi-hesaplama-result').classList.add('visible');
}
