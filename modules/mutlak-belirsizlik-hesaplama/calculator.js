function hcBelirsizlikHesapla() {
    const dataText = document.getElementById('hc-au-data').value.trim();
    const resultDiv = document.getElementById('hc-mutlak-belirsizlik-hesaplama-result');

    if (!dataText) {
        alert('Lütfen ölçüm değerlerini giriniz.');
        return;
    }

    const nums = dataText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));
    if (nums.length < 2) {
        alert('En az 2 ölçüm değeri gereklidir.');
        return;
    }

    const min = Math.min(...nums);
    const max = Math.max(...nums);
    const mean = nums.reduce((a, b) => a + b, 0) / nums.length;
    
    // Absolute Uncertainty = (max - min) / 2
    const uncertainty = (max - min) / 2;
    const relativeUncertainty = (uncertainty / mean) * 100;

    document.getElementById('hc-au-res-val').innerText = `± ${uncertainty.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;
    document.getElementById('hc-au-res-range').innerHTML = `Ölçüm Aralığı: <strong>${mean.toLocaleString('tr-TR', {maximumFractionDigits: 4})} ± ${uncertainty.toLocaleString('tr-TR', {maximumFractionDigits: 4})}</strong>`;
    document.getElementById('hc-au-res-relative').innerText = `Bağıl Belirsizlik: %${relativeUncertainty.toLocaleString('tr-TR', {maximumFractionDigits: 2})}`;

    resultDiv.classList.add('visible');
}
