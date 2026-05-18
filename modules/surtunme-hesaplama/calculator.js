function hcSurtunmeModuDegisti() {
    var mode = document.getElementById('hc-sh-mode').value;
    if (mode === 'incline') {
        document.getElementById('hc-sh-angle-group').style.display = 'block';
    } else {
        document.getElementById('hc-sh-angle-group').style.display = 'none';
    }
}

function hcSurtunmeHesapla() {
    var mode = document.getElementById('hc-sh-mode').value;
    var m = parseFloat(document.getElementById('hc-sh-m').value);
    var mus = parseFloat(document.getElementById('hc-sh-mus').value);
    var muk = parseFloat(document.getElementById('hc-sh-muk').value);
    var g = 9.80665; // m/s^2

    if (isNaN(m) || m <= 0) {
        alert('Lütfen geçerli bir kütle değeri girin.');
        return;
    }
    if (isNaN(mus) || mus < 0 || isNaN(muk) || muk < 0) {
        alert('Lütfen geçerli sürtünme katsayıları girin.');
        return;
    }
    if (muk > mus) {
        alert('Kinetik sürtünme katsayısı (μ_k) genellikle statik sürtünme katsayısından (μ_s) küçük veya eşit olmalıdır.');
    }

    var fn = 0;
    var angleDeg = 0;
    var desc = '';

    if (mode === 'flat') {
        // Fn = m * g
        fn = m * g;
        desc = 'Yatay zeminde duran ' + m.toLocaleString('tr-TR') + ' kg kütleli cisme etki eden normal kuvvet (yüzey tepki kuvveti) yerçekimi etkisiyle ' + fn.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N\'dur.';
    } else {
        angleDeg = parseFloat(document.getElementById('hc-sh-angle').value);
        if (isNaN(angleDeg) || angleDeg < 0 || angleDeg > 90) {
            alert('Lütfen 0 ile 90 derece arasında geçerli bir eğim açısı girin.');
            return;
        }
        var angleRad = (angleDeg * Math.PI) / 180;
        // Fn = m * g * cos(theta)
        fn = m * g * Math.cos(angleRad);
        
        // Inclined sliding component along plane: F_parallel = m * g * sin(theta)
        var fParallel = m * g * Math.sin(angleRad);
        desc = angleDeg.toLocaleString('tr-TR') + '° eğimli zeminde duran ' + m.toLocaleString('tr-TR') + ' kg kütleli cisme etki eden normal kuvvet ' + fn.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N\'dur. Cismi aşağı kaydırmaya çalışan eğim yönündeki kuvvet ise ' + fParallel.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N\'dur.';
    }

    // Fs = mus * Fn
    var fs = mus * fn;
    // Fk = muk * Fn
    var fk = muk * fn;

    document.getElementById('hc-sh-res-fn').innerText = fn.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-sh-res-fs').innerText = fs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-sh-res-fk').innerText = fk.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';

    desc += ' Cism harekete geçene kadar karşılaşacağı maksimum statik sürtünme direnci ' + fs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N\'dur. Cisim kaymaya veya hareket etmeye başladıktan sonra etki eden kinetik sürtünme kuvveti ise ' + fk.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N olacaktır.';
    document.getElementById('hc-sh-desc').innerText = desc;

    document.getElementById('hc-surtunme-hesaplama-result').classList.add('visible');
}
