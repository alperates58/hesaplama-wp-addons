function hcVarianceHesapla() {
    const input = document.getElementById('hc-v-input').value;
    const nums = input.split(',').map(n => parseFloat(n.trim())).filter(n => !isNaN(n));
    const type = document.getElementById('hc-v-type').value;

    if (nums.length < 2) {
        alert('Lütfen en az iki sayı giriniz.');
        return;
    }

    const mean = nums.reduce((a, b) => a + b, 0) / nums.length;
    const sqDiffs = nums.map(n => Math.pow(n - mean, 2));
    const sumSqDiffs = sqDiffs.reduce((a, b) => a + b, 0);
    
    const variance = type === 'sample' ? sumSqDiffs / (nums.length - 1) : sumSqDiffs / nums.length;
    const stdDev = Math.sqrt(variance);

    document.getElementById('hc-v-res-val').innerText = variance.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-v-sd').innerText = `Standart Sapma: ${stdDev.toLocaleString('tr-TR', { maximumFractionDigits: 4 })}`;
    document.getElementById('hc-varyans-result').classList.add('visible');
}
