function hcGmroiHesapla() {
    const profit = parseFloat(document.getElementById('hc-gmroi-profit').value);
    const inventory = parseFloat(document.getElementById('hc-gmroi-inventory').value);

    if (!profit || !inventory) {
        alert('Lütfen kâr ve stok değerlerini girin.');
        return;
    }

    // GMROI = Gross Profit / Average Inventory Cost
    const gmroi = profit / inventory;
    
    document.getElementById('hc-gmroi-value').innerText = gmroi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-gmroi-comment').innerText = `Yatırılan her 1 ₺ stok için ${gmroi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} ₺ brüt kâr elde edilmektedir.`;
    
    document.getElementById('hc-gmroi-result').classList.add('visible');
}
