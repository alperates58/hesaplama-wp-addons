function hcWMAHesapla() {
    const input = document.getElementById('hc-wma-data').value;
    const period = parseInt(document.getElementById('hc-wma-period').value);
    const data = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));

    if (data.length < period) {
        alert(`Lütfen en az ${period} adet veri girin.`);
        return;
    }

    // Get the last 'period' elements
    const lastElements = data.slice(-period);
    
    let weightedSum = 0;
    let weightSum = 0;

    for (let i = 0; i < period; i++) {
        const weight = i + 1;
        weightedSum += lastElements[i] * weight;
        weightSum += weight;
    }

    const wma = weightedSum / weightSum;

    document.getElementById('hc-res-wma-val').innerText = wma.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-agirlikli-hareketli-ortalama-hesaplama-result').classList.add('visible');
}
