function hcPzdToggleInputs() {
    const type = document.getElementById('hc-pzd-type').value;
    if (type === 'fv') {
        document.getElementById('hc-pzd-pv-group').style.display = 'block';
        document.getElementById('hc-pzd-fv-group').style.display = 'none';
        document.getElementById('hc-pzd-result-label').innerText = 'Gelecek Değer (FV):';
    } else {
        document.getElementById('hc-pzd-pv-group').style.display = 'none';
        document.getElementById('hc-pzd-fv-group').style.display = 'block';
        document.getElementById('hc-pzd-result-label').innerText = 'Bugünkü Değer (PV):';
    }
}

function hcParaninZamanDegeriHesapla() {
    const type = document.getElementById('hc-pzd-type').value;
    const rate = parseFloat(document.getElementById('hc-pzd-rate').value) / 100;
    const time = parseFloat(document.getElementById('hc-pzd-time').value);

    if (isNaN(rate) || isNaN(time)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    let result = 0;
    if (type === 'fv') {
        const pv = parseFloat(document.getElementById('hc-pzd-pv').value);
        if (isNaN(pv)) { alert('Lütfen PV girin.'); return; }
        // FV = PV * (1 + i)^n
        result = pv * Math.pow(1 + rate, time);
    } else {
        const fv = parseFloat(document.getElementById('hc-pzd-fv').value);
        if (isNaN(fv)) { alert('Lütfen FV girin.'); return; }
        // PV = FV / (1 + i)^n
        result = fv / Math.pow(1 + rate, time);
    }

    document.getElementById('hc-pzd-value').innerText = result.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-pzd-result').classList.add('visible');
}
