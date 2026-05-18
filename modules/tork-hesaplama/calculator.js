function hcTorkSolveDegisti() {
    var mode = document.getElementById('hc-trq-solve').value;
    
    document.getElementById('hc-trq-t-group').style.display = mode === 'torque' ? 'none' : 'block';
    document.getElementById('hc-trq-f-group').style.display = mode === 'force' ? 'none' : 'block';
    document.getElementById('hc-trq-r-group').style.display = mode === 'radius' ? 'none' : 'block';
}

function hcTorkHesapla() {
    var mode = document.getElementById('hc-trq-solve').value;
    var theta = parseFloat(document.getElementById('hc-trq-theta').value);

    if (isNaN(theta) || theta < 0 || theta > 180) {
        alert('Lütfen 0 ile 180 derece arasında geçerli bir açı girin.');
        return;
    }

    var sinTheta = Math.sin((theta * Math.PI) / 180);
    
    if (sinTheta === 0 && mode !== 'torque') {
        alert('Açı 0 veya 180 derece olduğunda tork sıfırdır, bu açıyla diğer parametreler hesaplanamaz.');
        return;
    }

    var resVal = 0;
    var resLabel = '';
    var desc = '';

    if (mode === 'torque') {
        var F = parseFloat(document.getElementById('hc-trq-f').value);
        var r = parseFloat(document.getElementById('hc-trq-r').value);

        if (isNaN(F) || F < 0 || isNaN(r) || r < 0) {
            alert('Lütfen geçerli kuvvet ve mesafe değerleri girin.');
            return;
        }

        // tau = F * r * sin(theta)
        resVal = F * r * sinTheta;
        resLabel = 'Tork (τ):';
        desc = r.toLocaleString('tr-TR') + ' metre uzaklıktan ' + F.toLocaleString('tr-TR') + ' N kuvvet ' + theta.toLocaleString('tr-TR') + '° açı ile uygulandığında oluşan tork (döndürme kuvveti) ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N·m olarak bulunur.';
    } else if (mode === 'force') {
        var tau = parseFloat(document.getElementById('hc-trq-t').value);
        var r = parseFloat(document.getElementById('hc-trq-r').value);

        if (isNaN(tau) || tau < 0 || isNaN(r) || r <= 0) {
            alert('Lütfen geçerli tork ve pozitif mesafe değerleri girin.');
            return;
        }

        // F = tau / (r * sin(theta))
        resVal = tau / (r * sinTheta);
        resLabel = 'Gereken Kuvvet (F):';
        desc = r.toLocaleString('tr-TR') + ' metre kol mesafesi ve ' + theta.toLocaleString('tr-TR') + '° uygulama açısıyla ' + tau.toLocaleString('tr-TR') + ' N·m tork üretebilmek için uygulamanız gereken dik/açılı kuvvet tam olarak ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Newton olmalıdır.';
    } else {
        var tau = parseFloat(document.getElementById('hc-trq-t').value);
        var F = parseFloat(document.getElementById('hc-trq-f').value);

        if (isNaN(tau) || tau < 0 || isNaN(F) || F <= 0) {
            alert('Lütfen geçerli tork ve pozitif kuvvet değerleri girin.');
            return;
        }

        // r = tau / (F * sin(theta))
        resVal = tau / (F * sinTheta);
        resLabel = 'Gereken Kol Mesafesi (r):';
        desc = F.toLocaleString('tr-TR') + ' N kuvvet uygulayarak ' + theta.toLocaleString('tr-TR') + '° açıyla ' + tau.toLocaleString('tr-TR') + ' N·m tork üretebilmek için kullanmanız gereken döndürme kolu uzunluğu (yarıçap) ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' metre (yani ' + (resVal * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' cm) olmalıdır.';
    }

    var unit = mode === 'torque' ? ' N·m' : (mode === 'force' ? ' N' : ' m');
    document.getElementById('hc-trq-res-label').innerText = resLabel;
    document.getElementById('hc-trq-res-val').innerText = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + unit;
    document.getElementById('hc-trq-desc').innerText = desc;

    document.getElementById('hc-tork-hesaplama-result').classList.add('visible');
}
