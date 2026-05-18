function hcWattAmpereTipiDegisti() {
    var type = document.getElementById('hc-wta-type').value;
    var vInput = document.getElementById('hc-wta-voltage');
    var pfGroup = document.getElementById('hc-wta-pf-group');

    if (type === 'dc') {
        vInput.value = 12;
        pfGroup.style.display = 'none';
    } else if (type === 'ac1') {
        vInput.value = 220;
        pfGroup.style.display = 'block';
    } else {
        vInput.value = 380;
        pfGroup.style.display = 'block';
    }
}

function hcWattAmpereHesapla() {
    var W = parseFloat(document.getElementById('hc-wta-power').value);
    var type = document.getElementById('hc-wta-type').value;
    var V = parseFloat(document.getElementById('hc-wta-voltage').value);
    var pf = parseFloat(document.getElementById('hc-wta-pf').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli bir güç değeri girin.');
        return;
    }
    if (isNaN(V) || V <= 0) {
        alert('Lütfen geçerli ve pozitif bir voltaj değeri girin.');
        return;
    }

    var I = 0;
    var desc = '';

    if (type === 'dc') {
        // I = P / V
        I = W / V;
        desc = W.toLocaleString('tr-TR') + ' W güç çeken bir DC cihaz, ' + V.toLocaleString('tr-TR') + ' V gerilim altında tam olarak ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Amper akım çeker.';
    } else if (type === 'ac1') {
        if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
            alert('Lütfen 0.1 ile 1.0 arasında geçerli bir güç faktörü (cosφ) girin.');
            return;
        }
        // I = P / (V * pf)
        I = W / (V * pf);
        desc = W.toLocaleString('tr-TR') + ' W güç çeken bir tek fazlı AC cihaz, ' + V.toLocaleString('tr-TR') + ' V şebeke gerilimi ve ' + pf.toLocaleString('tr-TR') + ' güç faktörü (cosφ) altında tam olarak ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Amper akım çeker.';
    } else {
        if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
            alert('Lütfen 0.1 ile 1.0 arasında geçerli bir güç faktörü (cosφ) girin.');
            return;
        }
        // I = P / (sqrt(3) * V * pf)
        I = W / (Math.sqrt(3) * V * pf);
        desc = W.toLocaleString('tr-TR') + ' W güç çeken üç fazlı (sanayi tipi) bir AC cihaz, ' + V.toLocaleString('tr-TR') + ' V hatlar arası gerilim ve ' + pf.toLocaleString('tr-TR') + ' güç faktörü altında dengeli yükte tam olarak ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Amper hat akımı çeker.';
    }

    document.getElementById('hc-wta-res-amp').innerText = I.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Amper (A)';
    document.getElementById('hc-wta-desc').innerText = desc;

    document.getElementById('hc-watt-ampere-hesaplama-result').classList.add('visible');
}
