function hcBaklavaSyrupHesapla() {
    const flour = parseFloat(document.getElementById('hc-bs-flour').value) || 0;
    if (flour <= 0) return;

    // 1kg un için yaklaşık 1200gr şeker, 800ml su
    const sugar = flour * 1200;
    const water = flour * 800;

    document.getElementById('hc-res-bs-sugar').innerText = Math.round(sugar) + ' gr';
    document.getElementById('hc-res-bs-water').innerText = Math.round(water) + ' ml';
    
    document.getElementById('hc-baklava-syrup-result').classList.add('visible');
}
