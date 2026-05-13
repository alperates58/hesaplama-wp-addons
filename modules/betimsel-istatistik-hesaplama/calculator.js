function hcDescStatsHesapla() {
    const input = document.getElementById('hc-ds-data').value;
    const data = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n)).sort((a, b) => a - b);

    if (data.length < 2) {
        alert('Lütfen analiz için en az iki sayı girin.');
        return;
    }

    const n = data.length;
    const sum = data.reduce((a, b) => a + b, 0);
    const mean = sum / n;
    
    // Median
    const mid = Math.floor(n / 2);
    const median = n % 2 !== 0 ? data[mid] : (data[mid - 1] + data[mid]) / 2;

    // Mode
    const counts = {};
    data.forEach(x => counts[x] = (counts[x] || 0) + 1);
    let maxFreq = 0;
    let modes = [];
    for (const x in counts) {
        if (counts[x] > maxFreq) {
            maxFreq = counts[x];
            modes = [x];
        } else if (counts[x] === maxFreq) {
            modes.push(x);
        }
    }
    const modeStr = maxFreq > 1 ? modes.join(', ') : "Yok";

    // Variance & SD
    const variance = data.reduce((acc, x) => acc + Math.pow(x - mean, 2), 0) / (n - 1);
    const sd = Math.sqrt(variance);

    const min = data[0];
    const max = data[n - 1];
    const range = max - min;

    const results = [
        { label: "Gözlem Sayısı (n)", val: n },
        { label: "Ortalama", val: mean.toLocaleString('tr-TR', {maximumFractionDigits: 4}) },
        { label: "Medyan", val: median.toLocaleString('tr-TR') },
        { label: "Mod", val: modeStr },
        { label: "Standart Sapma (s)", val: sd.toLocaleString('tr-TR', {maximumFractionDigits: 4}) },
        { label: "Varyans (s²)", val: variance.toLocaleString('tr-TR', {maximumFractionDigits: 4}) },
        { label: "Minimum", val: min.toLocaleString('tr-TR') },
        { label: "Maksimum", val: max.toLocaleString('tr-TR') },
        { label: "Aralık (Range)", val: range.toLocaleString('tr-TR') }
    ];

    const tbody = document.getElementById('hc-ds-tbody');
    tbody.innerHTML = '';
    results.forEach(res => {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = res.label;
        row.insertCell(1).style.fontWeight = 'bold';
        row.insertCell(1).innerText = res.val;
    });

    document.getElementById('hc-betimsel-istatistik-hesaplama-result').classList.add('visible');
}
