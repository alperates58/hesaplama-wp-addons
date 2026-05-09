function hcAvgPHesapla() {
    const input = document.getElementById('hc-avgp-input').value;
    const data = input.split(/[,\s]+/)
        .map(n => parseFloat(n.trim()))
        .filter(n => !isNaN(n));

    if (data.length < 1) {
        alert('Lütfen en az bir yüzde değeri giriniz.');
        return;
    }

    const n = data.length;
    const sum = data.reduce((a, b) => a + b, 0);
    const average = sum / n;

    document.getElementById('hc-res-avgp-val').innerText = average.toLocaleString('tr-TR', { 
        maximumFractionDigits: 2 
    });

    document.getElementById('hc-avgp-result').classList.add('visible');
}
