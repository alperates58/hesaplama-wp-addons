function hcNewtonSoğumaYasasıHesapla() {
    const t0 = parseFloat(document.getElementById('hc-cool-t0').value);
    const ts = parseFloat(document.getElementById('hc-cool-ts').value);
    const k = parseFloat(document.getElementById('hc-cool-k').value);
    const t = parseFloat(document.getElementById('hc-cool-t').value);

    if (isNaN(t0) || isNaN(ts) || isNaN(k) || isNaN(t) || k <= 0 || t < 0) {
        alert('Lütfen geçerli ve pozitif soğuma sabiti (k) ile zaman (t) değerleri giriniz.');
        return;
    }

    // Newton's law of cooling: T(t) = Ts + (T0 - Ts) * e^(-k * t)
    const finalTemp = ts + (t0 - ts) * Math.exp(-k * t);

    document.getElementById('hc-cool-val').innerText = finalTemp.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';

    // Zaman tablosu oluşturalım
    const tbody = document.getElementById('hc-cool-table-body');
    tbody.innerHTML = '';

    const intervals = [0, Math.round(t/4), Math.round(t/2), Math.round(3*t/4), Math.round(t), Math.round(1.5*t), Math.round(2*t)];
    // Tekilleştirelim ve sıralayalım
    const uniqueIntervals = [...new Set(intervals)].sort((a, b) => a - b);

    uniqueIntervals.forEach(minute => {
        const tempAtTime = ts + (t0 - ts) * Math.exp(-k * minute);
        
        let ratio = '';
        if (t0 !== ts) {
            const pct = Math.abs((tempAtTime - t0) / (ts - t0)) * 100;
            ratio = '%' + pct.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' dengelendi';
        } else {
            ratio = '%100 dengelendi';
        }

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${minute} dk</td>
            <td><strong>${tempAtTime.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} °C</strong></td>
            <td>${ratio}</td>
        `;
        tbody.appendChild(tr);
    });

    document.getElementById('hc-newton-soguma-yasasi-result').classList.add('visible');
}
