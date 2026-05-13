function hcAscSortHesapla() {
    const input = document.getElementById('hc-asc-data').value;
    const data = input.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));

    if (data.length === 0) {
        alert('Lütfen geçerli sayılar girin.');
        return;
    }

    const sorted = data.sort((a, b) => a - b);
    
    const display = document.getElementById('hc-res-asc-list');
    display.innerText = sorted.map(n => n.toLocaleString('tr-TR')).join(' < ');
    
    document.getElementById('hc-res-asc-count').innerText = data.length;
    document.getElementById('hc-artan-siralama-hesaplama-result').classList.add('visible');
}
