function hcWattHesaplaModDegisti() {
    var mode = document.getElementById('hc-wth-mode').value;
    
    document.getElementById('hc-wth-v-group').style.display = mode === 'ir' ? 'none' : 'block';
    document.getElementById('hc-wth-i-group').style.display = mode === 'vr' ? 'none' : 'block';
    document.getElementById('hc-wth-r-group').style.display = mode === 'vi' ? 'none' : 'block';
}

function hcWattHesapla() {
    var mode = document.getElementById('hc-wth-mode').value;
    var W = 0;
    var desc = '';

    if (mode === 'vi') {
        var V = parseFloat(document.getElementById('hc-wth-v').value);
        var I = parseFloat(document.getElementById('hc-wth-i').value);

        if (isNaN(V) || V < 0 || isNaN(I) || I < 0) {
            alert('Lütfen geçerli voltaj ve akım değerleri girin.');
            return;
        }

        // P = V * I
        W = V * I;
        desc = V.toLocaleString('tr-TR') + ' Volt gerilim altında ' + I.toLocaleString('tr-TR') + ' Amper akım çeken bir elektrik devresinin toplam gücü ' + W.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Watt\'tır (Joule Kanunu: P = V × I).';
    } else if (mode === 'ir') {
        var I = parseFloat(document.getElementById('hc-wth-i').value);
        var R = parseFloat(document.getElementById('hc-wth-r').value);

        if (isNaN(I) || I < 0 || isNaN(R) || R < 0) {
            alert('Lütfen geçerli akım ve direnç değerleri girin.');
            return;
        }

        // P = I^2 * R
        W = Math.pow(I, 2) * R;
        desc = R.toLocaleString('tr-TR') + ' Ohm değerinde bir direnç üzerinden ' + I.toLocaleString('tr-TR') + ' Amper elektrik akımı geçtiğinde, direnç üzerinde ısıya dönüşen elektriksel güç ' + W.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Watt\'tır (P = I² × R).';
    } else {
        var V = parseFloat(document.getElementById('hc-wth-v').value);
        var R = parseFloat(document.getElementById('hc-wth-r').value);

        if (isNaN(V) || V < 0 || isNaN(R) || R <= 0) {
            alert('Lütfen geçerli voltaj ve pozitif direnç değerleri girin.');
            return;
        }

        // P = V^2 / R
        W = Math.pow(V, 2) / R;
        desc = R.toLocaleString('tr-TR') + ' Ohm değerindeki bir dirence ' + V.toLocaleString('tr-TR') + ' Volt gerilim uygulandığında, devrenin toplam gücü ' + W.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Watt olarak gerçekleşir (P = V² / R).';
    }

    var kw = W / 1000;

    document.getElementById('hc-wth-res-w').innerText = W.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' W';
    document.getElementById('hc-wth-res-kw').innerText = kw.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' kW';
    document.getElementById('hc-wth-desc').innerText = desc;

    document.getElementById('hc-watt-hesaplama-result').classList.add('visible');
}
