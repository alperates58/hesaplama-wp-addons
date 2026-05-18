function hcSurtunmeKuvvetiSablonDegisti() {
    var preset = document.getElementById('hc-skk-preset').value;
    var musInput = document.getElementById('hc-skk-mus');
    var mukInput = document.getElementById('hc-skk-muk');

    if (preset === 'rubber-concrete') {
        musInput.value = 0.9;
        mukInput.value = 0.7;
    } else if (preset === 'metal-metal-dry') {
        musInput.value = 0.6;
        mukInput.value = 0.4;
    } else if (preset === 'metal-metal-lubricated') {
        musInput.value = 0.15;
        mukInput.value = 0.06;
    } else if (preset === 'wood-wood') {
        musInput.value = 0.4;
        mukInput.value = 0.2;
    } else if (preset === 'ice-ice') {
        musInput.value = 0.1;
        mukInput.value = 0.03;
    }
}

function hcSurtunmeKuvvetiNormalDegisti() {
    var mode = document.getElementById('hc-skk-fn-mode').value;
    if (mode === 'force') {
        document.getElementById('hc-skk-fn-val-group').style.display = 'block';
        document.getElementById('hc-skk-m-val-group').style.display = 'none';
    } else {
        document.getElementById('hc-skk-fn-val-group').style.display = 'none';
        document.getElementById('hc-skk-m-val-group').style.display = 'block';
    }
}

function hcSurtunmeKuvvetiHesapla() {
    var mus = parseFloat(document.getElementById('hc-skk-mus').value);
    var muk = parseFloat(document.getElementById('hc-skk-muk').value);
    var fnMode = document.getElementById('hc-skk-fn-mode').value;
    var g = 9.80665; // m/s^2

    if (isNaN(mus) || mus < 0 || isNaN(muk) || muk < 0) {
        alert('Lütfen geçerli sürtünme katsayıları girin.');
        return;
    }

    var fn = 0;
    var desc = '';

    if (fnMode === 'force') {
        fn = parseFloat(document.getElementById('hc-skk-fn').value);
        if (isNaN(fn) || fn <= 0) {
            alert('Lütfen geçerli bir normal kuvvet değeri girin.');
            return;
        }
        desc = 'Cisme dik olarak etki eden normal tepki kuvveti ' + fn.toLocaleString('tr-TR') + ' N\'dur.';
    } else {
        var m = parseFloat(document.getElementById('hc-skk-m').value);
        if (isNaN(m) || m <= 0) {
            alert('Lütfen geçerli bir cisim kütlesi değeri girin.');
            return;
        }
        fn = m * g;
        desc = m.toLocaleString('tr-TR') + ' kg kütleye sahip bir cismin yerçekimi etkisiyle (' + g.toLocaleString('tr-TR') + ' m/s²) oluşturduğu normal tepki kuvveti ' + fn.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N\'dur.';
    }

    var fs = mus * fn;
    var fk = muk * fn;

    document.getElementById('hc-skk-res-fn').innerText = fn.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-skk-res-fs').innerText = fs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-skk-res-fk').innerText = fk.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';

    desc += ' Bu yüzey katsayılarına göre, cismi harekete başlatabilmek için aşılması gereken maksimum statik direnç eşiği ' + fs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N\'dur. Cisim kaymaya başladıktan sonra ise karşı koyacağı kinetik sürtünme kuvveti ' + fk.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N seviyesindedir.';
    document.getElementById('hc-skk-desc').innerText = desc;

    document.getElementById('hc-surtunme-kuvveti-hesaplama-result').classList.add('visible');
}
