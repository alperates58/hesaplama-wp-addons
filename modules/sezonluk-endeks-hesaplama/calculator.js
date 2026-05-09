function hcSeasonalIndexHesapla() {
    const input = document.getElementById('hc-si-data').value;
    const data = input.split(',').map(x => parseFloat(x.trim())).filter(x => !isNaN(x));

    if (data.length < 2) return;

    const avg = data.reduce((a, b) => a + b) / data.length;
    const container = document.getElementById('hc-si-list');
    container.innerHTML = '';

    data.forEach((val, idx) => {
        const index = (val / avg) * 100;
        const div = document.createElement('div');
        div.className = 'hc-result-item';
        div.innerHTML = `<span>Dönem ${idx + 1}:</span> <b>${index.toFixed(1)}</b>`;
        container.appendChild(div);
    });

    document.getElementById('hc-seasonal-index-result').classList.add('visible');
}
