function hcSortAscHesapla() {
    const input = document.getElementById('hc-sa-data').value;
    const order = document.getElementById('hc-sa-order').value;
    
    const data = input.replace(/[\n\r]/g, ',').split(',').map(x => x.trim()).filter(x => x !== '').map(x => parseFloat(x)).filter(x => !isNaN(x));

    if (data.length === 0) return;

    if (order === 'asc') {
        data.sort((a, b) => a - b);
    } else {
        data.sort((a, b) => b - a);
    }

    document.getElementById('hc-res-sa-val').value = data.join(', ');
    document.getElementById('hc-res-sa-count').innerText = data.length;
    
    document.getElementById('hc-sort-asc-result').classList.add('visible');
}
