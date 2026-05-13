function hcFrekansDagilimiHesapla() {
    const input = document.getElementById('hc-fd-data').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));

    if (data.length === 0) {
        alert('Lütfen geçerli veriler girin.');
        return;
    }

    const counts = {};
    data.forEach(x => {
        counts[x] = (counts[x] || 0) + 1;
    });

    const uniqueValues = Object.keys(counts).map(Number).sort((a, b) => a - b);
    const tbody = document.getElementById('hc-fd-tbody');
    tbody.innerHTML = '';
    const total = data.length;

    uniqueValues.forEach(val => {
        const freq = counts[val];
        const relative = freq / total;
        const percent = relative * 100;

        const row = tbody.insertRow();
        row.insertCell(0).innerText = val.toLocaleString('tr-TR');
        row.insertCell(1).innerText = freq.toLocaleString('tr-TR');
        row.insertCell(2).innerText = relative.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
        row.insertCell(3).innerText = "%" + percent.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    });

    document.getElementById('hc-frekans-dagilimi-result').classList.add('visible');
}
