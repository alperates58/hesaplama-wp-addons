function hcDesilHesapla() {
    const input = document.getElementById('hc-dec-data').value;
    const target = document.getElementById('hc-dec-target').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 2) {
        alert('En az 2 veri noktası girmelisiniz.');
        return;
    }

    const tbody = document.getElementById('hc-dec-tbody');
    tbody.innerHTML = '';

    function getPercentile(arr, p) {
        if (arr.length === 0) return 0;
        if (p <= 0) return arr[0];
        if (p >= 1) return arr[arr.length - 1];

        const index = (arr.length - 1) * p;
        const lower = Math.floor(index);
        const upper = Math.ceil(index);
        const weight = index - lower;

        if (lower === upper) return arr[lower];
        return arr[lower] * (1 - weight) + arr[upper] * weight;
    }

    if (target === 'all') {
        for (let i = 1; i <= 9; i++) {
            const val = getPercentile(data, i / 10);
            addRow(`D${i}`, val);
        }
        document.getElementById('hc-dec-summary').innerText = "Tüm desil değerleri hesaplandı.";
    } else {
        const k = parseInt(target);
        const val = getPercentile(data, k / 10);
        addRow(`D${k}`, val);
        document.getElementById('hc-dec-summary').innerText = `D${k} değeri hesaplandı.`;
    }

    function addRow(label, value) {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = label;
        row.insertCell(1).innerText = value.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    }

    document.getElementById('hc-desil-hesaplama-result').classList.add('visible');
}
