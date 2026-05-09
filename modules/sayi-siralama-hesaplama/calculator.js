function hcNumberSortHesapla() {
    const input = document.getElementById('hc-ns-data').value;
    const data = input.split(/[, \n]/).map(x => x.trim()).filter(x => x !== '').map(x => parseFloat(x)).filter(x => !isNaN(x));

    if (data.length === 0) return;

    data.sort((a, b) => a - b);

    document.getElementById('hc-res-ns-sorted').innerText = data.join(', ');
    document.getElementById('hc-res-ns-min').innerText = data[0];
    document.getElementById('hc-res-ns-max').innerText = data[data.length - 1];
    
    document.getElementById('hc-number-sort-result').classList.add('visible');
}
