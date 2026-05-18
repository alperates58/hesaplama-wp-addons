function hcWattTanVoltaTipiDegisti() {
    var type = document.getElementById('hc-wtv2-type').value;
    var pfGroup = document.getElementById('hc-wtv2-pf-group');

    if (type === 'dc') {
        pfGroup.style.display = 'none';
    } else {
        pfGroup.style.display = 'block';
    }
}

function hcWattTanVoltaHesapla() {
    var W = parseFloat(document.getElementById('hc-wtv2-power').value);
    var I = parseFloat(document.getElementById('hc-wtv2-current').value);
    var type = document.getElementById('hc-wtv2-type').value;
    var pf = parseFloat(document.getElementById('hc-wtv2-pf').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli bir güç değeri (Watt) girin.');
        return;
    }
    if (isNaN(I) || I <= 0) {
        alert('Lütfen pozitif bir akım değeri (Amper) girin.');
        return;
    }

    var V = 0;
    var desc = '';

    if (type === 'dc') {
        // V = P / I
        V = W / I;
        desc = I.toLocaleString('tr-TR') + ' Amper akım altında ' + W.toLocaleString('tr-TR') + ' W güç harcayan DC devrenin gerilim düşümü/değeri ' + V.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Volt\'tur.';
    } else if (type === 'ac1') {
        if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
            alert('Lütfen 0.1 ile 1.0 arasında geçerli bir güç faktörü girin.');
            return;
        }
        // V = P / (I * PF)
        V = W / (I * pf);
        desc = I.toLocaleString('tr-TR') + ' Amper akım çeken ' + W.toLocaleString('tr-TR') + ' W gücündeki tek fazlı AC devrenin, ' + pf.toLocaleString('tr-TR') + ' güç faktöründeki efektif şebeke gerilimi ' + V.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Volt\'tur.';
    } else {
        if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
            alert('Lütfen 0.1 ile 1.0 arasında geçerli bir güç faktörü girin.');
            return;
        }
        // V = P / (sqrt(3) * I * PF)
        V = W / (Math.sqrt(3) * I * pf);
        desc = I.toLocaleString('tr-TR') + ' Amper hat akımı çeken ' + W.toLocaleString('tr-TR') + ' W gücündeki üç fazlı AC devrenin, ' + pf.toLocaleString('tr-TR') + ' güç faktöründeki hatlar arası (L-L) gerilimi ' + V.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Volt olarak bulunur.';
    }

    document.getElementById('hc-wtv2-res-volt').innerText = V.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Volt (V)';
    document.getElementById('hc-wtv2-desc').innerText = desc;

    document.getElementById('hc-watt-tan-volta-hesaplama-result').classList.add('visible');
}
