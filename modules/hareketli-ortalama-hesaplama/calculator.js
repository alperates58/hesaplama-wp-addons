function hcHareketliOrtalamaHesapla() {
    const input = document.getElementById('hc-ma-data').value;
    const windowSize = parseInt(document.getElementById('hc-ma-window').value);
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));

    if (data.length < windowSize || windowSize < 1) {
        alert('Veri sayısı pencere aralığından büyük veya eşit olmalıdır.');
        return;
    }

    const results = [];
    for (let i = 0; i < data.length; i++) {
        if (i < windowSize - 1) {
            results.push(null);
        } else {
            let sum = 0;
            for (let j = 0; j < windowSize; j++) {
                sum += data[i - j];
            }
            results.push(sum / windowSize);
        }
    }

    const tbody = document.getElementById('hc-ma-tbody');
    tbody.innerHTML = '';
    const fmt = (val) => val === null ? '-' : val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    results.forEach((val, idx) => {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = idx + 1;
        row.insertCell(1).innerText = data[idx].toLocaleString('tr-TR');
        row.insertCell(2).innerText = fmt(val);
    });

    const lastVal = results[results.length - 1];
    document.getElementById('hc-res-ma-last').innerText = fmt(lastVal);
    document.getElementById('hc-hareketli-ortalama-result').classList.add('visible');
}
