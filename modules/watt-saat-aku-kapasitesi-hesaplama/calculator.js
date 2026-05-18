function hcWattSaatAkuModDegisti() {
    var mode = document.getElementById('hc-wsa-mode').value;
    
    document.getElementById('hc-wsa-wh-group').style.display = mode === 'to_ah' ? 'block' : 'none';
    document.getElementById('hc-wsa-ah-group').style.display = mode === 'to_wh' ? 'block' : 'none';
}

function hcWattSaatAkuVoltajDegisti() {
    var vSelect = document.getElementById('hc-wsa-voltage-select').value;
    var customGroup = document.getElementById('hc-wsa-custom-v-group');
    
    if (vSelect === 'custom') {
        customGroup.style.display = 'block';
    } else {
        customGroup.style.display = 'none';
    }
}

function hcWattSaatAkuHesapla() {
    var mode = document.getElementById('hc-wsa-mode').value;
    var vSelect = document.getElementById('hc-wsa-voltage-select').value;
    
    var V = parseFloat(vSelect);
    if (vSelect === 'custom') {
        V = parseFloat(document.getElementById('hc-wsa-custom-v').value);
    }

    if (isNaN(V) || V <= 0) {
        alert('Lütfen geçerli ve pozitif bir nominal voltaj değeri girin.');
        return;
    }

    var resVal = 0;
    var resLabel = '';
    var mah = 0;
    var desc = '';

    if (mode === 'to_ah') {
        var wh = parseFloat(document.getElementById('hc-wsa-wh').value);
        if (isNaN(wh) || wh < 0) {
            alert('Lütfen geçerli bir Watt-saat değeri girin.');
            return;
        }

        // Ah = Wh / V
        resVal = wh / V;
        resLabel = 'Kapasite (Amper-saat - Ah):';
        mah = resVal * 1000;
        desc = wh.toLocaleString('tr-TR') + ' Wh enerji kapasitesine sahip bir pil/akü, ' + V.toLocaleString('tr-TR') + ' V nominal voltaj altında tam ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Ah (' + mah.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' mAh) kapasiteye sahiptir.';
    } else {
        var ah = parseFloat(document.getElementById('hc-wsa-ah').value);
        if (isNaN(ah) || ah < 0) {
            alert('Lütfen geçerli bir Amper-saat değeri girin.');
            return;
        }

        // Wh = Ah * V
        resVal = ah * V;
        resLabel = 'Kapasite (Watt-saat - Wh):';
        mah = ah * 1000;
        desc = ah.toLocaleString('tr-TR') + ' Ah (' + mah.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' mAh) şarj kapasitesine sahip bir pil/akü, ' + V.toLocaleString('tr-TR') + ' V nominal voltaj altında tam ' + resVal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Wh enerji depolar.';
    }

    document.getElementById('hc-wsa-res-label').innerText = resLabel;
    document.getElementById('hc-wsa-res-val').innerText = resVal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + (mode === 'to_ah' ? ' Ah' : ' Wh');
    document.getElementById('hc-wsa-res-mah').innerText = mah.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' mAh';
    document.getElementById('hc-wsa-desc').innerText = desc;

    document.getElementById('hc-watt-saat-aku-kapasitesi-hesaplama-result').classList.add('visible');
}
