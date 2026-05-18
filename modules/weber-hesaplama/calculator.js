function hcWeberSolveDegisti() {
    var mode = document.getElementById('hc-web-solve').value;
    
    document.getElementById('hc-web-flux-group').style.display = mode === 'flux' ? 'none' : 'block';
    document.getElementById('hc-web-field-group').style.display = mode === 'field' ? 'none' : 'block';
    document.getElementById('hc-web-area-group').style.display = mode === 'area' ? 'none' : 'block';
}

function hcWeberHesapla() {
    var mode = document.getElementById('hc-web-solve').value;
    var theta = parseFloat(document.getElementById('hc-web-theta').value);

    if (isNaN(theta) || theta < 0 || theta > 90) {
        alert('Lütfen yüzey normali ile 0 ile 90 derece arasında geçerli bir açı girin.');
        return;
    }

    var cosTheta = Math.cos((theta * Math.PI) / 180);
    
    if (cosTheta === 0 && mode !== 'flux') {
        alert('Açı 90 derece olduğunda manyetik çizgiler yüzeye paraleldir ve akı sıfırdır, bu durumda diğer parametreler hesaplanamaz.');
        return;
    }

    var resVal = 0;
    var resLabel = '';
    var desc = '';
    var showMaxwell = false;
    var mxVal = 0;

    if (mode === 'flux') {
        var B = parseFloat(document.getElementById('hc-web-field').value);
        var A = parseFloat(document.getElementById('hc-web-area').value);

        if (isNaN(B) || B < 0 || isNaN(A) || A < 0) {
            alert('Lütfen geçerli manyetik alan ve yüzey alanı değerleri girin.');
            return;
        }

        // Phi = B * A * cos(theta)
        resVal = B * A * cosTheta;
        resLabel = 'Manyetik Akı (Φ):';
        mxVal = resVal * 1e8; // 1 Wb = 10^8 Maxwell
        showMaxwell = true;
        desc = B.toLocaleString('tr-TR') + ' Tesla gücündeki manyetik alanda, ' + A.toLocaleString('tr-TR') + ' m² yüzey alanına sahip bir yüzeyden normal açısı ' + theta.toLocaleString('tr-TR') + '° olacak şekilde geçen toplam manyetik akı ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' Weber\'dir.';
    } else if (mode === 'field') {
        var Phi = parseFloat(document.getElementById('hc-web-flux').value);
        var A = parseFloat(document.getElementById('hc-web-area').value);

        if (isNaN(Phi) || Phi < 0 || isNaN(A) || A <= 0) {
            alert('Lütfen geçerli akı ve pozitif yüzey alanı girin.');
            return;
        }

        // B = Phi / (A * cos(theta))
        resVal = Phi / (A * cosTheta);
        resLabel = 'Manyetik Alan (B):';
        desc = A.toLocaleString('tr-TR') + ' m² yüzeyden ' + theta.toLocaleString('tr-TR') + '° açı ile ' + Phi.toLocaleString('tr-TR') + ' Wb manyetik akı elde edebilmek için gereken minimum manyetik alan şiddeti ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' Tesla (T) olmalıdır.';
    } else {
        var Phi = parseFloat(document.getElementById('hc-web-flux').value);
        var B = parseFloat(document.getElementById('hc-web-field').value);

        if (isNaN(Phi) || Phi < 0 || isNaN(B) || B <= 0) {
            alert('Lütfen geçerli akı ve pozitif manyetik alan girin.');
            return;
        }

        // A = Phi / (B * cos(theta))
        resVal = Phi / (B * cosTheta);
        resLabel = 'Gereken Yüzey Alanı (A):';
        desc = B.toLocaleString('tr-TR') + ' Tesla şiddetindeki alanda, ' + theta.toLocaleString('tr-TR') + '° açı ile ' + Phi.toLocaleString('tr-TR') + ' Wb akı üretebilmek için gereken yüzey kesit alanı ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' metrekare (m²) olmalıdır.';
    }

    var unit = mode === 'flux' ? ' Wb' : (mode === 'field' ? ' T' : ' m²');
    document.getElementById('hc-web-res-label').innerText = resLabel;
    document.getElementById('hc-web-res-val').innerText = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + unit;
    
    if (showMaxwell) {
        document.getElementById('hc-web-res-extra-row').style.display = 'flex';
        document.getElementById('hc-web-res-maxwell').innerText = mxVal.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Mx';
    } else {
        document.getElementById('hc-web-res-extra-row').style.display = 'none';
    }
    
    document.getElementById('hc-web-desc').innerText = desc;
    document.getElementById('hc-weber-hesaplama-result').classList.add('visible');
}
