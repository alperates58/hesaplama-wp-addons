function hcDescSortHesapla() {
    const input = document.getElementById('hc-sort-data').value;
    const data = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));

    if (data.length === 0) {
        alert('Lütfen geçerli sayılar girin.');
        return;
    }

    const sorted = data.sort((a, b) => b - a);
    
    const display = document.getElementById('hc-res-sorted-list');
    display.innerText = sorted.map(n => n.toLocaleString('tr-TR')).join(' > ');
    
    document.getElementById('hc-res-sort-count').innerText = data.length;
    document.getElementById('hc-buyukten-kucuge-siralama-hesaplama-result').classList.add('visible');
}
