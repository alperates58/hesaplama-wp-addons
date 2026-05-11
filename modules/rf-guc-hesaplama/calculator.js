function hcRfDbmToWatt() {
    const dbm = parseFloat(document.getElementById('hc-rf-dbm').value);
    const wattInput = document.getElementById('hc-rf-watt');
    const resultDiv = document.getElementById('hc-rf-guc-result');

    if (isNaN(dbm)) {
        wattInput.value = '';
        resultDiv.classList.remove('visible');
        return;
    }

    const watt = Math.pow(10, (dbm - 30) / 10);
    wattInput.value = watt.toFixed(6).replace(/\.?0+$/, "");
    
    document.getElementById('hc-rf-res-dbm').innerText = dbm.toLocaleString('tr-TR') + ' dBm';
    document.getElementById('hc-rf-res-watt').innerText = watt.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' W';
    resultDiv.classList.add('visible');
}

function hcRfWattToDbm() {
    const watt = parseFloat(document.getElementById('hc-rf-watt').value);
    const dbmInput = document.getElementById('hc-rf-dbm');
    const resultDiv = document.getElementById('hc-rf-guc-result');

    if (isNaN(watt) || watt <= 0) {
        dbmInput.value = '';
        resultDiv.classList.remove('visible');
        return;
    }

    const dbm = 10 * Math.log10(watt * 1000);
    dbmInput.value = dbm.toFixed(2);

    document.getElementById('hc-rf-res-dbm').innerText = dbm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dBm';
    document.getElementById('hc-rf-res-watt').innerText = watt.toLocaleString('tr-TR') + ' W';
    resultDiv.classList.add('visible');
}
